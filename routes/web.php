<?php

use App\Http\Controllers\aboutusController;
use App\Http\Controllers\addAdminController;
use App\Http\Controllers\adminCategoryController;
use App\Models\product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registController;
use App\Http\Controllers\productController;
use App\Http\Controllers\allProductController;
use App\Http\Controllers\allCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\profileAdminController;
use App\Http\Controllers\profileDashboardController;
use App\Models\User;
use App\Http\Controllers\CartDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homeController::class, 'index']);

Route::get('/home', [homeController::class, 'index']);

Route::get('/product', [productController::class, 'index']);

Route::get('/product/{singleproduct:slug}', [productController::class, 'show']);

Route::get('/aboutus', [aboutusController::class, 'index']);

Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/regist', [registController::class, 'index']);
Route::post('/regist', [registController::class, 'store']);

Route::get('/dashboard/products/all', [allProductController::class, 'index'])->middleware('isAdmin');
Route::get('/dashboard/products/{product:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('isAdmin');
Route::get('/dashboard/products/allcategory', [allCategoryController::class, 'index'])->middleware('isAdmin');
Route::resource('/dashboard/products/allcategory/create', adminCategoryController::class)->middleware('isAdmin');
Route::get('/dashboard/products/allcategory/create/checkSlug', [adminCategoryController::class, 'checkSlug']);
/*
Route::get('/dashboard/products/allcategory', function () {
    return view('/dashboard/products/allcategory', [
        'title' => 'All Category',
        'category' => category::with('product')->get()
    ]);
});
*/

Route::get('/dashboard', function () {
    return view('/dashboard/index',[
        'title' => "Dashboard",
        'active' => "Dashboard",
        'product' => product::with('category')->get(),
        'user' => User::all()->where('isAdmin', 0)
    ]);
})->middleware('isAdmin');

Route::get('/dashboardmember', function () {
    return view('/dashboardmember/index',[
        'title' => "Dashboard",
        'active' => "Dashboard",
        'product' => product::with('category')->get(),
        'user' => User::all()
    ]);
})->middleware('member');

Route::get('/dashboard/products/create/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/products/create', DashboardPostController::class)->middleware('isAdmin');
Route::get('/dashboard/products/{singleproduct:slug}', [DashboardPostController::class, 'show'])->middleware('isAdmin');

/*
Route::get('/dashboard/products/create', function () {
    return view('/dashboard/products/create', [
        'title' => "Add Product"
    ]);
});

Route::get('/dashboard/products/edit', function () {
    return view('/dashboard/products/edit',[
        'title' => "Edit",
        'active' => "Edit"
    ]);
});
*/
//Route::get('/dashboard', [DashboardController::class, 'index']);

Route::delete('/dashboard/products/all/{product:slug}', [DashboardPostController::class, 'destroy'])->middleware('isAdmin');
Route::put('/dashboard/products/{product:slug}/edit', [DashboardPostController::class, 'update'])->middleware('isAdmin');

Route::get('/dashboard/admin', function(){
    return view('/dashboard/data/admin',[
        'title' => 'Admin',
        'user' => User::all()->where('isAdmin', 1)
    ]);
})->middleware('isAdmin');

Route::get('/dashboard/member', function(){
    return view('/dashboard/data/member',[
        'title' => 'Member',
        'user' => User::all()->where('isAdmin', 0)
    ]);
})->middleware('isAdmin');

Route::get('/dashboard/all-transaction', function(){
    return view('/dashboard/transaction/all-transaction',[
        'title' => 'All Transaction',
        'user' => User::all()
    ]);
})->middleware('isAdmin');

Route::get('/dashboard/detail', function(){
    return view('/dashboard/transaction/detail',[
        'title' => 'Detail Transaction',
        'user' => User::all()
    ]);
})->middleware('isAdmin');

Route::get('/dashboard/detail/edit', function(){
    return(view('/dashboard/transaction/edit-transaction',[
        'title' => 'Edit Transaction',
        'user' => User::all()
    ]));
})->middleware('isAdmin');

// Route::get('/dashboard/profil', function(){
//     return view('/dashboard/profil',[
//         'title' => 'Profil'
//     ]);
// });

Route::get('/dashboardmember/profile/view', [profileDashboardController::class, 'show'])->middleware('member');
Route::get('/dashboardmember/profile/{User:id}/edit', [profileDashboardController::class, 'edit'])->middleware('member');
Route::resource('/dashboardmember/profile/edit', profileDashboardController::class)->middleware('member');
Route::put('/dashboardmember/profile/{User:id}/edit', [profileDashboardController::class, 'update'])->middleware('member');

Route::get('/dashboard/data/add', [addAdminController::class, 'index'])->middleware('isAdmin');
Route::post('/dashboard/data/add', [addAdminController::class, 'store'])->middleware('isAdmin');

Route::get('/dashboard/profile', [profileAdminController::class, 'index'])->middleware('isAdmin');
Route::put('/dashboard/profile', [profileAdminController::class, 'update'])->middleware('isAdmin');
Route::get('/dashboard/myprofile', function(){
    return view('dashboard/data/view', [
        'title' => 'My Profile',
        'user' => auth()->user()
    ]);
})->middleware('isAdmin');

Route::group(['middleware' => 'member'], function() {
    // cart
    Route::resource('Transaction', 'transactionController');
    Route::patch('kosongkan/{id}', 'CartController@kosongkan');
    // cart detail
    // Route::resource('cartdetail', 'CartDetailController');
  });

// cart detail
Route::resource('cartdetail', CartDetailController::class)->middleware('member');