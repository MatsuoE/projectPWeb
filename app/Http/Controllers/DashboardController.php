<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $title = array('title' => 'Dashboard');
        return view('dashboard.index', $title);
    }
}