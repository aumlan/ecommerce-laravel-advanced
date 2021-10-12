<?php

namespace App\Http\Controllers\Frontend;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegistrationNotification;
use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register()
    {
        $email = 'aumlan.springsoftit@gmail.com';
        try {
            $user = User::create([
                'name'=> 'aumlan',
                'email' => $email,
                'phone_number' => '01767125279',
                'password' => bcrypt('12345678'),
                'email_verified_token' => uniqid( time().$email,true). Str::random(8)
            ]);

            $user->notify(new UserRegistrationNotification($user));

            setSuccess('Account Created');

        }catch (\Exception $e){
            setError($e->getMessage());
        }

        return redirect()->route('frontend.home');
    }

    public function login()
    {

    }

    public function activate($token = null)
    {
        if ($token===null){
            return redirect()->route('frontend.home');
        }

        $user = User::where('email_verified_token',$token)->firstOrFail();

        if ($user){
            $user->update([
                'email_verified_at' => Carbon::now(),
                'email_verified_token' => null
            ]);
            setSuccess('Account Activated');
            return redirect()->route('frontend.home');
        }

        setError('Invalid Token');
        return redirect()->route('frontend.home');

    }

}
