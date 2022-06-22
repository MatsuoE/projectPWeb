<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class allProductController extends Controller
{
    public function index(){
        return view('/dashboard/products/all', [
            'title' => 'All Products',
            'product' => product::with('category')->get()
        ]);
    }
}
