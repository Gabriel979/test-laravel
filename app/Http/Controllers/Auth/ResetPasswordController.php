<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }



    protected $redirectTo = '/admin';

   /* protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => '123456789012345678901234567890123456789012345678901234567890',
            'remember_token' => Str::random(60),
        ])->save();

        //Auth::login($user);
        $this->guard()->login($user);
    }*/

    
    protected function resetPassword($user, $password){
         $user->password = $password;
         $user->save();
         Auth::login($user);
     }


}
