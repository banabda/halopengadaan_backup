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

Route::get('coba', function () {
    return view('dashboard.user.daftar-membership');
});

Route::get('/', 'Landing\HomeController@index')->name('landing');

Auth::routes();

// Save Paket
Route::post('purchase/{id}', 'Landing\PurchaseController@savePaket')->name('landing.paket');

Route::group(['prefix' => 'admin', 'middleware' => ['role:super admin']], function()
{
    // crud narasumber
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

     // crud halaman metode pembayaran
     Route::get('methodadmin','Metodepembayaran\MetodepembayaranController@index')->name('metodepembayaran');
     Route::post('buatmethod','Metodepembayaran\MetodepembayaranController@create')->name('metodepembayaran.create');


    Route::get('dashboard', 'Dashboard\HomeController@index')->name('dashboard.index');

    // Users
    Route::resource('user', 'Dashboard\Auth\UsersController');

    // Role
    Route::resource('role', 'Dashboard\Auth\RoleController');

    // Permission
    Route::resource('permission', 'Dashboard\Auth\PermissionController');
});

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('profile', 'DashboardUser\HomeController@profile')->name('profile');
    Route::post('profile/save', 'DashboardUser\HomeController@saveProfile')->name('profile.save');
    Route::post('profile/upload/save', 'DashboardUser\HomeController@uploadPicture')->name('profile.upload.save');
});

Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function ()
{
    Route::get('dashboard', 'DashboardUser\HomeController@index')->name('user.index.2');
});


// Route::group(['prefix' => 'narasumber', 'middleware' => ['role:user']], function()
// {

// });
// Route::group(['prefix' => 'mambership', 'middleware' => ['role:user']], function()
// {

// });
// Route::group(['prefix' => 'metodepembayaran', 'middleware' => ['role:user']], function()
// {

// });

