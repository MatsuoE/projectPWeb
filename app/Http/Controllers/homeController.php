<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home',[
            'title' => "Home",
            'active' => "Home",
            'category' => category::with('product')->latest()->get(),
        ]);
    }
}
