<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Socialite;

class LoginController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser                    = new User;
            $newUser->provider_name     = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar            = $user->getAvatar();
            $newUser->save();

            auth()->login($newUser, true);
        }

        return redirect($this->redirectPath());
    }

//    public function redirectToProvider()
//    {
//        return Socialite::driver('google')->redirect();
//    }
//
//    /**
//     * Obtain the user information from GitHub.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function handleProviderCallback()
//    {
//        $user = Socialite::driver('google')->user();
//
//        // $user->token;
//    }
}
