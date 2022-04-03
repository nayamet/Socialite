<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function handleGoogleCallBack()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $data = (array)$user;

        if(session('from') == 'login')
        {
            session(['from' => null]);
            return redirect()->route('login.google.submit', $data);
        }
        if(session('from') == 'registration')
        {
            session(['from' => null]);
            return redirect()->route('registration.google.submit', $data);
        }
    }
}
