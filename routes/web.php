<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});



Route::get('/',[\App\Http\Controllers\CustomLoginController::class,'user_login'])->name('user.login');
Route::post('/user-login-submit',[\App\Http\Controllers\CustomLoginController::class,'user_login_submit'])->name('user.login.submit');
Route::get('/user-register',[\App\Http\Controllers\CustomLoginController::class,'user_register'])->name('user.register');
Route::post('/user-register-save',[\App\Http\Controllers\CustomLoginController::class,'user_register_save'])->name('user.register.submit');


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

        //api accounts
        Route::get('/api-accounts', [\App\Http\Controllers\User\UserAccountController::class,'api_accounts'])->name('user.api.account');
        Route::get('/api-account-create', [\App\Http\Controllers\User\UserAccountController::class,'api_accounts_create'])->name('user.api.account.create');
        Route::post('/api-account-save', [\App\Http\Controllers\User\UserAccountController::class,'api_accounts_save'])->name('user.api.account.save');

        //user domain list
        Route::get('/domain-list', [\App\Http\Controllers\User\UserDomainController::class,'domain_list'])->name('user.domain.list');
        Route::get('/domain-create', [\App\Http\Controllers\User\UserDomainController::class,'domain_create'])->name('user.domain.create');
        Route::post('/domain-save', [\App\Http\Controllers\User\UserDomainController::class,'domain_save'])->name('user.domain.save');
    });
});


Route::prefix('admin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'showLoginform'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');
});



Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');
    });
});
