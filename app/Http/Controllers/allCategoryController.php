<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class allCategoryController extends Controller
{
    public function index(){
        return view('/dashboard/products/allcategory', [
            'title' => 'All Category',
            'category' => category::with('product')->get()
        ]);
    }
}
