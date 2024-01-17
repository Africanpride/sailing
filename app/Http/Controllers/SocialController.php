<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */


    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('google_id', $user->id)
            ->orWhere('email', $user->email)
            ->first();

        try {
            // Get the authenticated user from the Google OAuth provider
            if ($existingUser)
            {
                // If the user already exists, log them in and redirect to the homepage
                Auth::login($existingUser);
                app('flasher')->addSuccess('success', 'Login successful!');

                return Redirect::intended(route('home'));



            } else {

                if (!empty($user->getAvatar()) && $user->getAvatar() != '' && $user->getAvatar() != null) {
                    $fileContents = file_get_contents($user->getAvatar());
                    $avatar_file_name = uniqid('social_avatar_') . ".jpg";
                    Storage::disk('public')->put($avatar_file_name, $fileContents);
                }

                $newUser = User::create([
                    'firstName' => $user->user['given_name'],
                    'lastName' => $user->user['family_name'],
                    'email' => $user->user['email'],
                    'google_id' => $user->user['id'],
                    'participant' => true,
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(12)),
                    'must_create_password' => true, // Add flag to indicate that the user must reset password
                    'social_avatar' => $avatar_file_name
                ]);

                // Give User role as participant
                $newUser->assignRole('participant');

                Auth::login($newUser);

                if (auth()->check()) {
                    // If the user is authenticated, redirect to the intended URL or home
                    app('flasher')->addSuccess('success', 'Login successful!');

                    return Redirect::intended(route('home'));
                }

            }
        } catch (Exception $e) {
            // dd($e);
            return redirect('login')->withErrors(['error' => 'Unable to authenticate with Google. Please try again later.']);
        }

    }
}
