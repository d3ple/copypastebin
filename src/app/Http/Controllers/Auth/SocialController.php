<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Socialite;


class SocialController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }

        $authUser = User::firstOrCreate(
            ['auth_provider_user_id' => $user->id, 'auth_provider' => $provider],
            ['name' => $user->name, 'email' => $user->email]);
        auth()->login($authUser);
        return redirect()->to('/');
    }

}