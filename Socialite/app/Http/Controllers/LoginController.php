<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Authenticate.login');
    }

    public function loginGoogle()
    {
        session(['from' => 'login']);
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function loginSubmit(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ],
        );
        $findUser = User::where('email', $req->email)->first();
        if(Hash::check($req->password, $findUser->password))
        {
            if($findUser->status == 0)
            {
                Session::flash('message', 'You are blocked');
                return redirect()->route('login');
            }
            Session::put('id', $findUser->id);
            Session::put('email', $findUser->email);
            Session::put('name', $findUser->name);
            Session::put('type', $findUser->type);
            Session::put('status', $findUser->status);
            return redirect()->route('home');
        }
        Session::flash('message', 'Wrong credentials');
        return redirect()->route('login');
    }

    public function loginGoogleSubmit(Request $user)
    {
        $findUser = User::where('google_id', $user->id)->first();
        if($findUser)
        {
            if($findUser->status == 0)
            {
                Session::flash('message', 'You are blocked');
                return redirect()->route('login');
            }
            Session::put('id', $findUser->id);
            Session::put('email', $findUser->email);
            Session::put('name', $findUser->name);
            Session::put('type', $findUser->type);
            Session::put('status', $findUser->status);
            return redirect()->route('home');
           
        }
        else
        {
            Session::flash('message', 'You have no account with this google account');
            return redirect()->route('login');
        }
    }
}
