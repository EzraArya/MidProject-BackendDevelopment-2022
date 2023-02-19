<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        $validated = $request->validate($validateRule, [
            'username.required' => 'Username is required',
            'username.min:3' => 'Username must have a minimum length of 3 characters',
            'username.max:15' => 'Username must have a maximum length of 15 characters',
            'password.required' => 'Password is required',
            'password.min:8' => 'Password must have a minimum length of 8 characters',
            'password.max:20' => 'Password must have a maximum length of 20 characters'
        ]);

        $remember = $request->remember;

        if (Auth::attempt($credentials)) {
            if ($remember){
                Cookie::queue('last_username', $request->username, 10080);
                Session::put('loginsession', $credentials);
            }
            return redirect()->back();
        }
        return 'Login Failed';
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
            'username'=>'required|min:3|max:15',
            'password'=>'required|min:8|max:20|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->back();
        
    }
}
