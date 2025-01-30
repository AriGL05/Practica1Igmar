<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailCode;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Providers\JWT\Provider;
use Tymon\JWTAuth\JWTGuard;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['login']]); 
    }
    //Login User
    public function login(Request $request)
    {
        //Verify reCAPTCHA
        $recaptcha_response = $request->input('g-recaptcha-response');

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            //Verify user inputs
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
            }
            
            $user = User::where('email', $request->email)->first();

            if(!$user){
                return redirect()
                ->back()
                ->withErrors(["msg"=>"User not found."])
                ->withInput();
            }

            if(!$user || !Hash::check($request->password, $user->password)){
                return redirect()
                ->back()
                ->withErrors(["msg"=>"Incorrect Email or Password."])
                ->withInput();
            }

            if($user->email_verified == false){
                return redirect()
                ->back()
                ->withErrors(["msg"=>"Email not verified."])
                ->withInput();
            }

            //Ask for code to send
            Auth::login($user);
            $this->getCode($user->id);
            return redirect()->route('index.verifycode');
        }
        else {
            return redirect()->back()->withErrors(['captcha' => 'ReCAPTCHA verification failed. Please try again.'])->withInput();
        }
    }
    //Create code for User
    function getCode($userId){
        $user = User::find($userId);
        $code = random_int(100000, 999999);
        $user->{'2fa_code'} = $code;
        $user->{'2fa_code_at'} = Carbon::now();
        $user->save();

        $this->sendVerifyCodeEmail($user->email, $code);

    }

    //Send email with code to User email
    function sendVerifyCodeEmail($email, $code){

        try {
            Mail::to($email)->send((new EmailCode($code))->build());
        }catch (\Exception $e){
            return response()->json(["success" => false, "message" => "Internal error."], 500);
        }

    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
        ]);

        $user = auth()->user();

        if ($request->code == $user->{'2fa_code'}) {
            session()->forget('verify_user_id');
            $user->{'2fa_code'} = null;
            $user->{'2fa_code_at'} = null;
            $user->save();
            return redirect()->route('dashboard.index')->with('success', 'Verification successful!');
        }
        return redirect()
            ->back()
            ->withErrors(["msg"=>"Invalid verification code."])
            ->withInput();
    }

    public function logout(){

        $user = auth()->user();

        if (!$user) {
            return response()->json(['msg' => 'User not found'], 404);
        };

        Auth::logout();

        return redirect()->route('index.login');

    }
}
