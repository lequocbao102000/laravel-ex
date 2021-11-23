<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get( 'admin/users/login',[LoginController::class,'index'])->name('login');
Route::post( 'admin/users/login/store',[LoginController::class,'store']);

//Nhom cac route can dang nhap
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get( 'main',[MainController::class,'index'])->name('admin');

        #Menu
        Route::prefix('menu')->group(function(){
            Route::get( 'add',[MenuController::class,'create'])->name('create');
            Route::post( 'add',[MenuController::class,'store']);

            Route::get( 'list',[MenuController::class,'index']);

            Route::get( 'destroy/{menu}',[MenuController::class,'destroy']);
            Route::get( 'edit/{menu}',[MenuController::class,'edit']);
            Route::post( 'edit/{menu}',[MenuController::class,'update']);
            
        });

        #Product
        Route::prefix('product')->group(function(){
            Route::get( 'add',[ProductController::class,'create'])->name('create_product');
            Route::post( 'add',[ProductController::class,'store']);

            Route::get( 'list',[ProductController::class,'index']);

            Route::get( 'destroy/{product}',[ProductController::class,'destroy']);
            Route::get( 'edit/{product}',[ProductController::class,'edit']);
            Route::post( 'edit/{product}',[ProductController::class,'update']);
        });
    });
   
});

