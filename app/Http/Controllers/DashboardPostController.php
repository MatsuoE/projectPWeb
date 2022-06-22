<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function index(){
        //$product = product::latest()->paginate(5);
        
        return view('dashboard.products.create', [
            'title' => "Add Product",
            'category' => category::with('product')->get()
        ]);
    }

    public function show(product $singleproduct){
        return view('/dashboard/products/seeproduct',[
            "title" => 'Products',
            'active' => 'Products',
            "product" => $singleproduct
        ]);
    }
    
    public function create(){
        return view('dashboard.products.all', [
            'category' => category::all()
        ]);
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:product',
            'stock' => 'required',
            'image' => 'image|file|max:2400',
            'price' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);
        
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        
        
        //$validatedData['user_id'] -> auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));
        
        
        product::create($validatedData);
        return redirect('/dashboard/products/all')->with('success', 'New product has been added');
    }
    
    public function edit(product $product){
        return view('dashboard.products.edit',[
            'title' => "Edit",
            'active' => "Edit",
            'product' => $product,
            'category' => category::all()
        ]);
    }

    public function update(Request $request, product $product){
        $rules = [
            'title' => 'required|max:255',
            'stock' => 'required',
            'image' => 'image|file|max:1024',
            'price' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $product->slug){
            $rules['slug'] = 'unique:product';
        }
        
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));
        
        product::where('id', $product->id)->update($validatedData);
        return redirect('/dashboard/products/all')->with('edited', 'Product has been edited');
    }
    
    public function destroy(product $product){
        if($product->image){
            Storage::delete($product->image);
        }

        product::destroy($product->id);
        return redirect('/dashboard/products/all')->with('deleted', 'Your product has been deleted');
    }

    

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}