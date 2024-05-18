<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



//Admin
route::get('/product', [AdminController::class, 'product']);

route::post('/uploadproduct', [AdminController::class,'uploadproduct']);

route::get('/showproduct', [AdminController::class, 'showproduct']);

route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

route::get('/updateview/{id}', [AdminController::class, 'updateview']);

route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

route::get('/admindash', [AdminController::class, 'admindash']);


//User
route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/search', [HomeController::class, 'search']);

route::get('/ourproduct', [HomeController::class, 'ourproduct']);

route::post('/addcart/{id}', [HomeController::class, 'addcart']);

route::get('/delete/{id}', [HomeController::class, 'deletecart']);

route::post('/order', [HomeController::class, 'confirmorder']);


