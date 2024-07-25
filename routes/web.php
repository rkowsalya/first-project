<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\Auth\admin\LoginController as LogController;
use App\Http\Controllers\Auth\admin\RegisterController as RegController;
use App\Http\Controllers\Auth\customer\RegisterController as CustRegController;
use App\Http\Controllers\Auth\customer\LoginController as CustomerLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/nllk', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as'=>'admins.'],function(){
    Route::get('/main',[Admincontroller::class,'main'])->name('main');
    Route::get('/dashboard' ,  [Admincontroller::class,'dashboard'])->name('dashboard');
    Route::get('/cust_register',[RegController::class,'showRegistrationForm'])->name('cust_register');
    Route::post('/create_register',[RegController::class,'create'])->name('create_register');
    Route::get('/cust_login',[LogController::class,'showLoginForm'])->name('cust_login');
    Route::post('/cust_login',[LogController::class,'login'])->name('cust_login');
    Route::get('/show_category',[categorycontroller::class,'show_category'])->name('show_category');
    Route::post('/store_category',[categorycontroller::class,'store'])->name('store_category');
    Route::get('/edit_category/{id}',[categorycontroller::class,'edit'])->name('edit_category');
    Route::post('/update_category/{id}',[categorycontroller::class,'update'])->name('update_category');
    Route::delete('/destroy_category/{id}',[categorycontroller::class,'destroy'])->name('destroy_category');
    Route::get('/show_add_product',[productcontroller::class,'add_product'])->name('show_add_product');
    Route::post('/store_product',[productcontroller::class,'store_product'])->name('store_product');
    Route::get('/{id}/edit_product',[productcontroller::class,'edit'])->name('edit_product');
    Route::post('/{id}/update_product',[productcontroller::class,'update'])->name('update_product');
    Route::delete('/{id}/destroy_product',[productcontroller::class,'destroy'])->name('destroy_product');



    Route::post('/logout',[LogController::class,'logout'])->name('logout');
    Route::get('/{id}/profile',[Admincontroller::class,'profile'])->name('profile');
    Route::post('/{id}/update',[Admincontroller::class,'update'])->name('update');



});
Route::get('/',[customercontroller::class,'main'])->name('base');
Route::group(['prefix'=>'customer','as'=>'customers.'],function(){



Route::get('/register',[CustRegController::class,'showRegistrationForm'])->name('register');
Route::post('/create_register',[CustRegController::class,'create'])->name('create_register');
Route::get('/login',[CustomerLoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[CustomerLoginController::class,'login'])->name('login');
Route::post('/logout',[CustomerLoginController::class,'logout'])->name('logout');
Route::get('/product',[customercontroller::class,'product'])->name('product');
Route::get('/cart',[customercontroller::class,'cart'])->name('cart');
Route::get('/add_cart/{id}',[customercontroller::class,'add_cart'])->name('add_cart');
Route::delete('/remove/{id}',[customercontroller::class,'remove'])->name('remove');







});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');








