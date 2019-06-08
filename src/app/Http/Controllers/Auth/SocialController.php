<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Redirect;
use Socialite;
use Illuminate\Support\MessageBag;


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


        try {
            $authUser = User::firstOrCreate(
                ['auth_provider_user_id' => $user->id, 'auth_provider' => $provider],
                ['name' => $user->name, 'email' => $user->email]);
        } catch (Exception $e) {
            $errors = new MessageBag;
            $errors->add('email', 'The same email is already registered. Use it to log in.');
            return view('auth.login')->withErrors($errors);
        }

        auth()->login($authUser);
        return redirect()->to('/');
    }

}