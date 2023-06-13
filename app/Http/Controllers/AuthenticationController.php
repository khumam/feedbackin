<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    /**
     * googleAuth redirect
     *
     * @return void
     */
    public function googleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * googleAuthCallback
     *
     * @return void
     */
    public function googleAuthCallback()
    {
        try {
            $response = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            $response = Socialite::driver('google')->stateless()->user();
        }
        $user = User::updateOrCreate([
            'provider' => 'google',
            'provider_id' => $response->id
        ], [
            'name' => $response->name,
            'email' => $response->email,
            'avatar' => $response->avatar,
            'provider_token' => $response->token,
            'provider_refresh_token' => $response->refreshToken,
            'provider_expires_in' => $response->expiresIn,
            'password' => $response->id
        ]);
        Auth::login($user, true);
        return redirect('/dashboard');
    }
}
