<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
      $request->validate([
            'name' => ['required', 'string','min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'min:8','max:255'],
        ]);
       $user = User::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>Hash::make(request('password')), 
       ]);

       Auth::login($user);
       return redirect('/')->with('success', 'Registration complete!');
    }
}
