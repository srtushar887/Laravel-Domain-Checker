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
        Route::post('/domain-delete', [\App\Http\Controllers\User\UserDomainController::class,'domain_delete'])->name('user.domain.delete');
        Route::post('/domain-folder-save', [\App\Http\Controllers\User\UserDomainController::class,'domain_folder_save'])->name('user.domain.folder.save');

        //user domain folder
        Route::get('/folders', [\App\Http\Controllers\User\UserDomainController::class,'folders'])->name('user.folder');
        Route::get('/folder-create', [\App\Http\Controllers\User\UserDomainController::class,'folder_create'])->name('user.folder.create');
        Route::post('/folder-save', [\App\Http\Controllers\User\UserDomainController::class,'folder_save'])->name('user.folder.save');
        Route::post('/folder-update', [\App\Http\Controllers\User\UserDomainController::class,'folder_update'])->name('user.folder.update');
        Route::post('/folder-delete', [\App\Http\Controllers\User\UserDomainController::class,'folder_delete'])->name('user.folder.delete');

        //user whois checker
        Route::get('/user-whois-checker', [\App\Http\Controllers\User\UserDomainController::class,'user_whois_checker'])->name('user.whois.checker');
        Route::post('/user-whois-checdata', [\App\Http\Controllers\User\UserDomainController::class,'user_whois_checldata'])->name('user.whois.checkdata');

        //upgrade account
        Route::get('/user-upgrade-account', [\App\Http\Controllers\User\UserAccountController::class,'user_upgrade_account'])->name('user.updgrade.account');
        Route::post('/user-upgrade-account-payment', [\App\Http\Controllers\User\UserAccountController::class,'user_upgrade_account_payment'])->name('user.updgrade.account.payment');

        //stripe payment
        Route::get('/user-payment-stripe/{type}/{amount}', [\App\Http\Controllers\User\UserAccountController::class,'user_payment_stripe'])->name('user.payment.stripe');
        Route::post('/user-payment-stripe-save', [\App\Http\Controllers\User\UserAccountController::class,'user_payment_stripe_save'])->name('user.payment.stripe.save');

        //paypal payment
        Route::get('/user-payment-paypal/{type}/{amount}', [\App\Http\Controllers\User\UserAccountController::class,'user_payment_paypal'])->name('user.payment.paypal');
        Route::get('/user-payment-paypal-success', [\App\Http\Controllers\User\UserAccountController::class,'user_payment_paypal'])->name('payment.success');
        Route::get('/user-payment-paypal-cancel', [\App\Http\Controllers\User\UserAccountController::class,'user_payment_paypal'])->name('payment.cancel');
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

        //users
        Route::get('/users', [\App\Http\Controllers\Admin\AdminUserController::class,'users'])->name('admin.users');

        //plans
        Route::get('/plans', [\App\Http\Controllers\Admin\AdminPlanController::class,'plans'])->name('admin.plans');

        //user bill
        Route::get('/user-bill', [\App\Http\Controllers\Admin\AdminUserController::class,'user_bill'])->name('admin.users.bill');
    });
});
