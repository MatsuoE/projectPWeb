<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutusController extends Controller
{
    public function index(){
        return view('aboutus',[
            'title' => "About Us",
            'active' => "About Us"
        ]);
    }
}
