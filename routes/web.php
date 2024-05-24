<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;



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

route::get('/updateorderstatus/{id}', [AdminController::class, 'updateorderstatus']);



//User Dashboard
route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/search', [HomeController::class, 'search']);

route::get('/ourproduct', [HomeController::class, 'ourproduct']);

route::post('/addcart/{id}', [HomeController::class, 'addcart']);

route::get('/delete/{id}', [HomeController::class, 'deletecart']);

route::post('/order', [HomeController::class, 'confirmorder']);

route::get('/about', [HomeController::class, 'about']);



//Admin & User Management
//Admin Accounts
Route::get('/admins', [UserController::class, 'admins']);

Route::post('/admincreate', [UserController::class, 'admincreate']);

Route::get('/admindelete/{id}', [UserController::class, 'admindelete']);

Route::get('/updateadmin/{id}', [UserController::class, 'updateadmin']);

Route::post('/adminupdate/{id}', [UserController::class, 'adminupdate']);

Route::get('/adminshow', [UserController::class, 'adminshow'])->name('adminshow');

//User Accounts
Route::get('/users', [UserController::class, 'users']);

Route::post('/usercreate', [UserController::class, 'usercreate']);

Route::get('/userdelete/{id}', [UserController::class, 'userdelete']);

Route::get('/updateuser/{id}', [UserController::class, 'updateuser']);

Route::post('/userupdate/{id}', [UserController::class, 'userupdate']);

Route::get('/usershow', [UserController::class, 'usershow'])->name('usershow');



//Contact Management
Route::get('/contact', [ContactController::class, 'contact']);

Route::post('/contactform', [ContactController::class,'contactform']);

Route::get('/showfeedback', [ContactController::class, 'showfeedback']);

route::get('/updatefeedbackstatus/{id}', [ContactController::class, 'updatefeedbackstatus']);

route::get('/deletefeedback/{id}', [ContactController::class, 'deletefeedback']);
