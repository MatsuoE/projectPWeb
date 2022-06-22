<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registController extends Controller
{
    public function index(){
        return view('regist',[
            'title' => "Registration",
            'active' => "Registration"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil, Silahkan Login!');
    }

}