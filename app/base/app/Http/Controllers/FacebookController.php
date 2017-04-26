<?php

namespace App\Http\Controllers;

use Socialite;
use Auth;
use App\User;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
          $user = Socialite::driver('facebook')->user();
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

        if($authUser) {
          return $authUser;
        }

        return User::create([
          'name'=>$facebookUser->name,
          'email'=>$facebookUser->email,
          'password'=>str_random(40),
          'facebook_id'=>$facebookUser->id
        ]);
    }
}
