<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class addAdminController extends Controller
{
    public function index(){
        return view('dashboard.data.add', [
            'title' => 'Add New Admin',
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20',
            'address' => 'required|max:255',
            'number' => 'required|unique:users|max:255'
        ]);
        $validatedData['isAdmin'] = 1;
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/dashboard/admin')->with('success', 'New admin has been added');
    }
}
