<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

use App\User;

class SocialGitHubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')
            ->scopes(['read:user', 'public_repo'])
            ->redirect();
    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('github')->user();

        $existingUser = User::where('provider_id', $user->getId())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        }
        else {
            $newUser = new User();

            $newUser->email = $user->getEmail();
            $newUser->provider_id = $user->getId();
            $newUser->name = $user->getNickname();
            $newUser->username = $user->getNickname();
            $newUser->handle_github = $user->getNickname();
            $newUser->password = bcrypt(uniqid());


            $newUser->save();

            Auth::login($newUser);
        }

        flash('Successfully authenticated using GitHub');

        return redirect('/');
    }
}
