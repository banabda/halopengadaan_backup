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
    Route::post('store','Narasumber\NarasumberController@store')->name('narasumber.store');
    Route::get('detail/{id}','Narasumber\NarasumberController@detail');
    Route::get('delete/{id}','Narasumber\NarasumberController@delete');
    Route::get('edit/{id}','Narasumber\NarasumberController@edit');
    Route::post('update','Narasumber\NarasumberController@update')->name('narasumber.update');

    // CRUD halaman mambership
    Route::get('memberadmin','Mambership\MambershipController@index')->name('mambership');
    Route::post('buat','Mambership\MambershipController@store')->name('mambership.store');
    Route::get('detailmamber/{id}','Mambership\MambershipController@detailmamber');
    Route::get('deletemamber/{id}','Mambership\MambershipController@deletemamber');
    Route::get('editmamber/{id}','Mambership\MambershipController@editmamber');
    Route::post('updatemamber','Mambership\MambershipController@updatemamber')->name('mambership.updatemamber');

     // crud halaman metode pembayaran
     Route::get('metode-pembayaran','Metodepembayaran\MetodepembayaranController@index')->name('metodepembayaran');
     Route::post('buatmethod','Metodepembayaran\MetodepembayaranController@store')->name('metodepembayaran.store');
     Route::get('detailmethod/{id}','Metodepembayaran\MetodepembayaranController@detailmethod');
     Route::get('deletemethod/{id}','Metodepembayaran\MetodepembayaranController@deletemethod');
     Route::get('editmethod/{id}','Metodepembayaran\MetodepembayaranController@editmethod');
     Route::post('updatemethod','Metodepembayaran\MetodepembayaranController@updatemethod')->name('metodepembayaran.updatemethod');

    Route::get('dashboard', 'Dashboard\HomeController@index')->name('dashboard.index');

    // Users
    Route::resource('user', 'Dashboard\Auth\UsersController');

    // Role
    Route::resource('role', 'Dashboard\Auth\RoleController');

    // Permission
    Route::resource('permission', 'Dashboard\Auth\PermissionController');

    // Data Pembayaran Invoice
    Route::get('invoice', 'Dashboard\HomeController@invoice')->name('admin.dashboard.invoice');
    Route::post('proses/invoice/{id}', 'Dashboard\HomeController@prosesInvoice')->name('admin.dashboard.invoice.proses');
});

Route::group(['middleware' => ['auth']], function ()
{
    // Update Profile
    Route::get('profile', 'DashboardUser\HomeController@profile')->name('profile');
    Route::post('profile/save', 'DashboardUser\HomeController@saveProfile')->name('profile.save');
    Route::post('profile/upload/save', 'DashboardUser\HomeController@uploadPicture')->name('profile.upload.save');
});

Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function ()
{
    // Dashboard User Membership
    Route::get('membership', 'DashboardUser\HomeController@registerMembership')->name('user.dashboard.membership');
    Route::post('save/membership', 'DashboardUser\HomeController@saveRegisterMembership')->name('user.dashboard.membership.save');
    Route::get('getProviders/{nama_method}', 'DashboardUser\HomeController@getProviders')->name('user.dashboard.membership.getProviders');
    Route::post('save/buktipembayaran', 'DashboardUser\HomeController@saveBuktiPembayaran')->name('user.dashboard.saveBuktiPembayaran');

    // Dashboard User Invoice
    Route::get('invoice', 'DashboardUser\HomeController@invoiceprofil')->name('user.dashboard.invoice');
    Route::get('invoiceprofil/laporan', 'DashboardUser\HomeController@laporan')->name('user.dashboard.cetak');

    // Konsultasi Sekarang
    Route::get('konsultasi', 'DashboardUser\HomeController@konsultasi')->name('user.dashboard.konsultasi');
});
