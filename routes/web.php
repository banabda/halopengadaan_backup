<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('coba', function () {
    return view('components.paket');
});

Route::get('/', 'Landing\HomeController@index')->name('landing');

Auth::routes();


// Save Paket
Route::get('purchase/{id}', 'Landing\PurchaseController@savePaket')->name('landing.paket');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['role:super admin']], function()
{
    Route::get('dashboard', 'Dashboard\HomeController@index')->name('dashboard.index');

    // Users
    Route::resource('user', 'Dashboard\Auth\UsersController');

    // Role
    Route::resource('role', 'Dashboard\Auth\RoleController');

    // Permission
    Route::resource('permission', 'Dashboard\Auth\PermissionController');
});
