<?php

use App\Http\Controllers\StripeController;
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



//User Dashboard
Route::get('/', [HomeController::class, 'redirect'])->name('home');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/ourproduct', [HomeController::class, 'ourproduct']);

Route::post('/addcart/{id}', [HomeController::class, 'addcart']);

Route::get('/delete/{id}', [HomeController::class, 'deletecart']);

Route::post('/order', [HomeController::class, 'confirmorder'])->name('order');

Route::get('/about', [HomeController::class, 'about']);



//Admin Dashboard
Route::get('/admindash', [AdminController::class, 'admindash']);

//Product Management
Route::get('/product', [AdminController::class, 'product']);

Route::post('/uploadproduct', [AdminController::class,'uploadproduct']);

Route::get('/showproduct', [AdminController::class, 'showproduct']);

Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

Route::get('/updateview/{id}', [AdminController::class, 'updateview']);

Route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

//Order Management
Route::get('/showorder', [AdminController::class, 'showorder']);

Route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder']);

Route::get('/updateorderstatus/{id}', [AdminController::class, 'updateorderstatus']);



//User Management
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



//Feedback Management
Route::get('/contact', [ContactController::class, 'contact']);

Route::post('/contactform', [ContactController::class,'contactform']);

Route::get('/showfeedback', [ContactController::class, 'showfeedback']);

Route::get('/updatefeedbackstatus/{id}', [ContactController::class, 'updatefeedbackstatus']);

Route::get('/deletefeedback/{id}', [ContactController::class, 'deletefeedback']);



//Stripe API
Route::post('/stripe', [StripeController::class, 'stripe'])->name('stripe');

Route::get('/stripe/success', [StripeController::class, 'stripesuccess'])->name('stripesuccess');

Route::get('/stripe/cancel', [StripeController::class, 'stripecancel'])->name('stripecancel');


