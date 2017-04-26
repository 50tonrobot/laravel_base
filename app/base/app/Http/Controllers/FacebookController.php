<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
          $user = Socialite::with('facebook')->stateless()->user();
        } catch (Exception $e) {
          return redirect()->route('facebook.login');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser,true);

        return redirect()->route('movie.index');
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if(!$authUser)
        {
          $existingUser = User::where('email',$facebookUser->email)->first();

          if($existingUser)
          {
            $existingUser->facebook_id = $facebookUser->id;
            $existingUser->save();
            return $existingUser;
          }
          else
          {
            return User::create([
              'name'=>$facebookUser->name,
              'email'=>$facebookUser->email,
              'password'=>str_random(40),
              'facebook_id'=>$facebookUser->id
            ]);
          }
        } else {
          return $authUser;
        }
    }
}
