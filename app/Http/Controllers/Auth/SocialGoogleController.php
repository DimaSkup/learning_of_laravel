<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Exception;

use App\User;

class SocialGoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')
            ->scopes(['email', 'profile'])
            ->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('provider_id', $user->getId())->first();

            if ($existingUser) {
                Auth::login($existingUser);
            }
            else {
                $newUser = new User();

                $newUser->email = $user->getEmail();
                $newUser->provider_id = $user->getId();
                $newUser->name = $user->getName();
                $newUser->username = $user->getName();
                $newUser->handle_social = $user->getName();
                $newUser->password = bcrypt(uniqid());

                $newUser->save();

                Auth::login($newUser);
            }

            flash('Successfully authenticated using Google');

            return redirect('/');
        }
        catch (Exception $e) {
            dd("In file: ".$e->getFile(), "At line: ".$e->getLine(), "There is an error: '".$e->getMessage()."'");
        }
    }
}
