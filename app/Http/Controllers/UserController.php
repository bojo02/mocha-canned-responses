<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        return view("register.register");
    }

    public function login(){
        return view("login.login");
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email'), 'email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('home')->with('success','Your account has been created! Welcome on board ' . $user->name . '!');
    }

    public function loginAttempth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = auth()->attempt([
           'email' => $request->email,
            'password' => $request->password
        ]);

        if($login){
            return redirect()->route('home')->with('success','You have logged in!');
        }
        else{
            return redirect()->back()->with('wrong','Wrong credentials...');
        }
    }

    public function logout(){
        auth()->logout();

        return redirect(route('login'))->with('success', 'You have been logged out!');
    }
}
