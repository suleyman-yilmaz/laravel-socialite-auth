<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    /* ---------------------------------------------------------------------- */
    /*           F A C E B O O K  A N D  G O O G L E  A U T H                 */
    /* ---------------------------------------------------------------------- */

    public function authProviderRedirect($provider)
    {
        if ($provider) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function socialAuthentication($provider)
    {
        try {
            if ($provider) {
                $socialUser = Socialite::driver($provider)->user();

                $user = User::where('auth_provider_id', $socialUser->id)->first();

                if ($user) {
                    Auth::login($user);
                } else {
                    $userData = User::create([
                        'name' => $socialUser->name,
                        'email' => $socialUser->email,
                        'auth_provider_id' => $socialUser->id,
                        'auth_provider' => $provider,
                    ]);

                    if ($userData) {
                        Auth::login($userData);
                    }
                }

                return redirect()->route('dashboard');
            }
            abort(404);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
