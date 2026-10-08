<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'name' => ['required', 'string','min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);  
    }
}
