<?php


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\CityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\Admin\LoginAdminController;
use App\Http\Controllers\Auth\Admin\ResetPasswordAdminController;
use App\Http\Controllers\Auth\Admin\ForgotPasswordAdminController;
use App\Http\Controllers\Auth\Customer\RegisterCustomerController;

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

// Route::get('/', function () {
//     return view('home');
// });

/*****************************
 * PAGES ROUTES
 ****************************/
Route::get('/', [PageController::class, 'index'])->name('page.home');


/***************************
 * ADMIN ROUTES
 **************************/
Route::get('admin', [LoginAdminController::class, 'index'])->name('admin.home')->middleware("auth:web");
Route::get('admin/login', [LoginAdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [LoginAdminController::class, 'handleLogin'])->name('admin.handleLogin');
Route::get('admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/forget-password', [ForgotPasswordAdminController::class, 'getEmail'])->name('admin.forget.pasword');
Route::post('admin/forget-password', [ForgotPasswordAdminController::class, 'postEmail'])->name('admin.forget.pasword.post');
Route::get('admin/reset-password/{token}', [ResetPasswordAdminController::class, 'getPassword']);
Route::post('admin/reset-password', [ResetPasswordAdminController::class, 'updatePassword']);


Route::middleware('auth:web')->group(function () {

/*************************
 * CUSTOMER ROUTES
 *************************/
Route::get('customer/register', [RegisterCustomerController::class, 'register'])->name('customer.register');
Route::post('customer/register', [RegisterCustomerController::class, 'store']);

Route::get('admin/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
Route::get('admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('admin/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('admin/customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::put('admin/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::get('admin/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.delete');
Route::get('admin/customer/export', [CustomerController::class, 'export'])->name('admin.customer.export');
Route::get('admin/customer/generate/pdf/{id}', [CustomerController::class, 'genertePdf'])->name('admin.customer.pdf');

/*************************
 * STATE ROUTES
 *************************/
Route::get('admin/state', [StateController::class, 'index'])->name('admin.state.index');
Route::get('admin/state/create', [StateController::class, 'create'])->name('admin.state.create');
Route::post('admin/state/store', [StateController::class, 'store'])->name('admin.state.store');
Route::get('admin/state/edit/{id}', [StateController::class, 'edit'])->name('admin.state.edit');
Route::put('admin/state/update/{id}', [StateController::class, 'update'])->name('admin.state.update');
Route::get('admin/state/delete/{id}', [StateController::class, 'destroy'])->name('admin.state.delete');

/*************************
 * CITY ROUTES
 *************************/
Route::get('admin/city', [CityController::class, 'index'])->name('admin.city.index');
Route::get('admin/city/create', [CityController::class, 'create'])->name('admin.city.create');
Route::post('admin/city/store', [CityController::class, 'store'])->name('admin.city.store');
Route::get('admin/city/edit/{id}', [CityController::class, 'edit'])->name('admin.city.edit');
Route::put('admin/city/update/{id}', [CityController::class, 'update'])->name('admin.city.update');
Route::get('admin/city/delete/{id}', [CityController::class, 'destroy'])->name('admin.city.delete');


/*************************
 * USER ROUTES
 *************************/
Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::get('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');


});


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});
