<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // FACEBOOK LOGIN REDIRECT
    public function redirectToFacebook(Request $request)
    {
        $facebookUrl = Socialite::driver('facebook')
            ->stateless()
            ->redirectUrl($this->getFacebookRedirectUri())
            ->redirect()
            ->getTargetUrl();

        return response()->json(['url' => $facebookUrl]);
    }

    private function getFacebookRedirectUri()
    {
        return env('FACEBOOK_REDIRECT_URI', 'https://juanclick.ph/api/auth/facebook/callback');
    }

    // FACEBOOK CALLBACK HANDLER
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            // Find or create user
            $user = User::where('facebook_id', $facebookUser->id)->first();

            if (!$user) {
                // Check if user with same email exists
                $user = User::where('email', $facebookUser->email)->first();

                if ($user) {
                    $user->update(['facebook_id' => $facebookUser->id]);
                } else {
                    $user = User::create([
                        'fullname' => $facebookUser->name,
                        'email' => $facebookUser->email,
                        'facebook_id' => $facebookUser->id,
                    ]);
                }
            }

            // Generate Sanctum token
            $token = $user->createToken('auth_token')->plainTextToken;

            $frontendRedirect = 'https://juanclick.ph/services_registration';
            return redirect()->away($frontendRedirect . '?token=' . $token);

        } catch (\Exception $e) {
            \Log::error('Facebook login failed: ' . $e->getMessage());
            return redirect()->away('https://juanclick.ph/login?error=facebook_login_failed');
        }
    }
}
