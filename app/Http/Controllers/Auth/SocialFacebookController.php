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

class SocialFacebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')
            ->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $existingUser = User::where('provider_id', $user->getId())->first();

            if ($existingUser)
            {
                Auth::login($existingUser);
            }
            else
            {
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

            flash('Successfully authenticated using Facebook');

            return redirect('/');
        }
        catch (Exception $e)
        {
            dd("In file: ".$e->getFile(), "At line: ".$e->getLine(), "There is an error: '".$e->getMessage()."'");
        }
    }
}
