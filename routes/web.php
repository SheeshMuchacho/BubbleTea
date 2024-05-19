<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;



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



//Admin Dashboard
route::get('/product', [AdminController::class, 'product']);

route::post('/uploadproduct', [AdminController::class,'uploadproduct']);

route::get('/showproduct', [AdminController::class, 'showproduct']);

route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

route::get('/updateview/{id}', [AdminController::class, 'updateview']);

route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

route::get('/admindash', [AdminController::class, 'admindash']);

route::get('/showorder', [AdminController::class, 'showorder']);

route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder']);

route::get('/updatestatus/{id}', [AdminController::class, 'updatestatus']);



//Admin User Management
route::get('/admins', [UserController::class, 'admins']);

route::post('/admincreate', [UserController::class, 'admincreate']);

route::get('/admindelete/{id}', [UserController::class, 'admindelete']);

route::get('/adminshow', [UserController::class, 'adminshow']);

route::get('/users', [UserController::class, 'users']);

route::post('/usercreate', [UserController::class, 'usercreate']);

route::get('/userdelete/{id}', [UserController::class, 'userdelete']);

route::get('/usershow', [UserController::class, 'usershow']);



//User Dashboard
route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/search', [HomeController::class, 'search']);

route::get('/ourproduct', [HomeController::class, 'ourproduct']);

route::post('/addcart/{id}', [HomeController::class, 'addcart']);

route::get('/delete/{id}', [HomeController::class, 'deletecart']);

route::post('/order', [HomeController::class, 'confirmorder']);


