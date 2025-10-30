<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class EmailAuthController extends Controller
{
    public function redirectToGoogle()
    {
        // Redirect user directly to Google
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if user already exists
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if (!$user) {
                // Create new user if not existing
                $user = User::create([
                    'fullname'  => $googleUser->name,
                    'email'     => $googleUser->email,
                    'google_id' => $googleUser->id,
                ]);
            } else {
                // Update google_id if it's missing
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
            }

            // Generate token
            $token = $user->createToken('auth_token')->plainTextToken;

            return redirect()->away('https://juanclick.ph/dashboard?token=' . $token);

        } catch (\Exception $e) {
            \Log::error('Google login failed: ' . $e->getMessage());
            return redirect()->away('https://juanclick.ph/login?error=google_login_failed');
        }
    }
}