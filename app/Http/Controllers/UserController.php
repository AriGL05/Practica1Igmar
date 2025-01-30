<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Registers user and sends email with a unique URL for verification
    public function register(Request $request)
    {
        //Verifying reCAPTCHA
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
            //Verifying User
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:100|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'g-recaptcha-response' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
            }
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            try {
                //Saving user
                $user->save();
                Log::info("User created: " . json_encode($user));
            } catch (\Exception $e) {
                Log::critical($e);
                return redirect()
                ->back()
                ->withErrors(["msg"=>"Internal error. User was not saved."])
                ->withInput();
            }
    
            try {
                //Sending Email to user email
                Mail::to($user->email)->send(new EmailVerification($user));
            }catch (\Exception $e){
                Log::critical($e);
                $user->delete();
                return redirect()
                ->back()
                ->withErrors(["msg"=>"Internal error. Email was not sent."])
                ->withInput();
            }
            auth()->login($user);
            session()->flash('success', 'Registered successfully! Please check your email to verify your account.');
            return redirect()->back();
            
        } 
        else {
            return redirect()->back()->withErrors(['captcha' => 'ReCAPTCHA verification failed. Please try again.'])->withInput();
        }
    }
}
