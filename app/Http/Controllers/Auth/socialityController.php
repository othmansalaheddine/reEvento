<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class socialityController extends Controller
{
     
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();
//dd($socialiteUser);
        $existingUser = User::where('email', $socialiteUser->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
            return redirect('/dashboard');
        }

        $user = User::updateOrCreate([
          
            'provider' => $provider, 
        ], [
            'name' => $socialiteUser->name,
            'email' => $socialiteUser->email,
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }
}
