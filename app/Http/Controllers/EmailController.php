<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerificationToken;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{
    public function verify_email(Request $request, $user_id){
        if (!$request->hasValidSignature()) {
            return view('email.emailverificationerror');
        }

        $user = User::find($user_id);

        if (!$user){
            return view('email.usernotfound');
        }

        $userToken = EmailVerificationToken::where('user_id', $user_id)->first();

        if (!$userToken || !Hash::check($request->token, $userToken->token)) {
            return view('email.emailverificationerror');
        }

        $userToken->delete();

        $user->email_verified = true;
        $user->email_verified_at = now();
        $user->save();

        return view('email.emailverificationsuccess');
    }
}
