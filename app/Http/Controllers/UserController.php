<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        
        $validateRule = $request->validate([
            'username' => 'required|min:3|max:15',
            'password' => 'required|min:8|max:20'
        ]);

        $remember = $request->remember;
        $errors = new MessageBag;

        if (Auth::attempt($credentials)) {
            if ($remember){
                Cookie::queue('last_username', $request->username, 10080);
                Session::put('loginsession', $credentials);
            }
            return redirect()->route('home');
        }
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        return Redirect::back()->withErrors($errors);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validateRule = $request->validate([
            'name'=>'required|min:1|max:20',
            'username'=>'required|min:3|max:15|unique:users',
            'password'=>'required|min:8|max:20|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home');
        
    }
}
