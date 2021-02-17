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
Route::post('purchase/{id}', 'Landing\PurchaseController@savePaket')->name('landing.paket');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['role:super admin']], function()
{
    Route::get('','Narasumber\NarasumberController@index')->name('narasumber');

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
    Route::get('profile', 'DashboardUser\HomeController@profile')->name('user.profile');
});

// Route::prefix('narasumber')->group(function(){
Route::group(['prefix' => 'narasumber', 'middleware' => ['role:user']], function()
{
    // Route::get('','Narasumber\NarasumberController@index')->name('narasumber');
    Route::post('create','Narasumber\NarasumberController@create')->name('narasumber.create');
    Route::get('detail/{id}','Narasumber\NarasumberController@detail');
    Route::get('delete/{id}','Narasumber\NarasumberController@delete');
    Route::get('edit/{id}','Narasumber\NarasumberController@edit');
    Route::post('update','Narasumber\NarasumberController@update')->name('narasumber.update');
});
// Route::group(['prefix' => 'mambership', 'middleware' => ['role:user']], function()
// {
//     Route::get('','Mambership\MambershipController@index')->name('mambership');
//     Route::post('create','Narasumber\NarasumberController@create')->name('narasumber.create');
//     Route::get('detail/{id}','Narasumber\NarasumberController@detail');
//     Route::get('delete/{id}','Narasumber\NarasumberController@delete');
//     Route::get('edit/{id}','Narasumber\NarasumberController@edit');
//     Route::post('update','Narasumber\NarasumberController@update')->name('narasumber.update');
// });

