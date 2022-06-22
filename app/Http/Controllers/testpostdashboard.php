<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function create(){
        return view('/dashboard/products/create', [
            'category' => category::all()
        ]);
    }
    public function index(){
        return view('/dashboard/products/create', [
            'title' => "Add Product",
            'category' => category::with('product')->get()
        ]);
    }

    public function edit(product $product){
        return view('/dashboard/products/edit',[
            'title' => "Edit",
            'active' => "Edit",
            'product' => $product
        ]);
    }

    public function update(Request $request){
        $rules = [
            'image' => 'image|file|max:1024'
        ];

        #validasi post dulu baru img
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
    }

    public function destroy(product $product){
        if($product->oldImage){
            Storage::delete($product->oldImage);
        }

        #habis ini delete post
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:product',
            'stock' => 'required',
            'image' => 'image|file|max:1024',
            'price' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        DashboardPostController::create($validatedData);
        return redirect('/dashboard/products/create')->with('success', 'New product has been added');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
