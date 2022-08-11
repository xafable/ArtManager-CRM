<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function __construct(){
    }

    public function redirectToGoogle(){


        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback(){

            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::query()->where('google_id', $user->id)->first();

            if ($findUser) {

                Auth::login($findUser,true);


            } else {

                $newUser = User::query()->create([
                    'name' => $user->id,
                    'avatar'=>$user->avatar,
                    'fio' => $user->name,
                    'emails' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('1111'),
                ]);

                $newUser->assignRole('Viewer');
                Auth::login($newUser,true);

            }



        return redirect()->route('main');

    }
}
