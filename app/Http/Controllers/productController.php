<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $title ='';
        if(request('category')){
            $category = category::firstWhere('slug', request('category'));
            $title = ' by Category: ' . $category->name;
        }
        return view('product',[
            'title' => "All Products" . $title,
            'active' => 'Products',
            'product' => product::latest()->filter(request(['search', 'category']))->paginate(8)->withQueryString()
        ]);
    }
    
    public function show(product $singleproduct){
        return view('1product', [
            "title" => 'Products',
            'active' => 'Products',
            "product" => $singleproduct
        ]);
    }
}
