<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SessionsController extends Controller
{
     public function create(){
        return view("auth.login");
    }

    public function store(Request $request){
       $validated = $request->validate([
        "email"=> ["required","email","string","max:255"],
        "password"=> ["required","string",Password::default()],
       ]);

       if(Auth::attempt($validated)){
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success', 'You are now logged in!'); 
       }
       return back()->withErrors(['email'=>'The provided credentials do not match our records.'])->withInput();
    }

    public function destroy(){
        Auth::logout();
        return redirect("/");
    }
}
