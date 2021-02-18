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

Route::get('wp-admin', function () {
    return view('wp-admin.login');
});

Route::get('lostpassword/wp-login', function () {
    return view('wp-admin.lost-password');
});

Route::get('/', 'Landing\HomeController@index')->name('landing');

Auth::routes();

// Save Paket
Route::post('purchase/{id}', 'Landing\PurchaseController@savePaket')->name('landing.paket');

Route::group(['prefix' => 'admin', 'middleware' => ['role:super admin']], function()
{
    Route::get('','Narasumber\NarasumberController@index')->name('narasumber');
    Route::post('create','Narasumber\NarasumberController@create')->name('narasumber.create');
    Route::get('detail/{id}','Narasumber\NarasumberController@detail');
    Route::get('delete/{id}','Narasumber\NarasumberController@delete');
    Route::get('edit/{id}','Narasumber\NarasumberController@edit');
    Route::post('update','Narasumber\NarasumberController@update')->name('narasumber.update');

    // crud halaman mambership
    Route::get('admin','Mambership\MambershipController@index')->name('mambership');
    Route::post('buat','Mambership\MambershipController@create')->name('mambership.create');
    // Route::get('buat/{id}','Mambership\MambershipController@detail');
    // Route::get('buat/{id}','Mambership\MambershipController@delete');
    // Route::get('buat/{id}','Mambership\MambershipController@edit');
    // Route::post('buat','Mambership\MambershipController@update')->name('mambership.update');

    Route::get('dashboard', 'Dashboard\HomeController@index')->name('dashboard.index');

    // Users
    Route::resource('user', 'Dashboard\Auth\UsersController');

    // Role
    Route::resource('role', 'Dashboard\Auth\RoleController');

    // Permission
    Route::resource('permission', 'Dashboard\Auth\PermissionController');
});

Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function ()
{
    Route::get('dashboard', 'DashboardUser\HomeController@index')->name('user.index');
});

// Route::prefix('narasumber')->group(function(){
    Route::group(['prefix' => 'narasumber', 'middleware' => ['role:user']], function()
    {

    });
    Route::group(['prefix' => 'mambership', 'middleware' => ['role:user']], function()
    {
    });

