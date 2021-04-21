<?php

use App\Http\Controllers\Chat\BidangController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Chat\HomeChatController;
use App\Http\Controllers\Chat\RoomController;
use App\Http\Controllers\Chat\TicketController;
use App\Http\Controllers\DashboardNarasumber\NarasumberController;
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

// Register Narasumber
Route::get('narasumber/register', 'DashboardNarasumber\NarasumberController@register')->name('narasumber.register');
Route::post('narasumber/register/save', 'DashboardNarasumber\NarasumberController@saveRegister')->name('narasumber.register.save');

Auth::routes();

// Save Paket
Route::post('purchase/{id}', 'Landing\PurchaseController@savePaket')->name('landing.paket');

// Show Artikel
Route::get('artikel/{slug}', 'Dashboard\ArtikelController@readArtikel')->name('landing.artikel.show');

// Menu Regulasi
Route::get('regulasi', 'Dashboard\RegulasiController@menuRegulasi')->name('landing.regulasi');
Route::get('regulasi/{id}', 'Dashboard\RegulasiController@seeDokumen')->name('landing.regulasi.dokumen');

// FAQ
Route::get('faq', 'Dashboard\FaqController@index')->name('landing.faq');

// Menu Artikel
Route::get('artikel', 'Dashboard\ArtikelController@menuArtikel')->name('landing.artikel');

Route::group(['prefix' => 'admin', 'middleware' => ['role:super admin']], function () {
    // crud halaman metode pembayaran
    Route::get('metode-pembayaran', 'Metodepembayaran\MetodepembayaranController@index')->name('metodepembayaran');
    Route::post('buatmethod', 'Metodepembayaran\MetodepembayaranController@store')->name('metodepembayaran.store');
    Route::get('detailmethod/{id}', 'Metodepembayaran\MetodepembayaranController@detailmethod');
    Route::get('deletemethod/{id}', 'Metodepembayaran\MetodepembayaranController@deletemethod');
    Route::get('editmethod/{id}', 'Metodepembayaran\MetodepembayaranController@editmethod');
    Route::post('updatemethod', 'Metodepembayaran\MetodepembayaranController@updatemethod')->name('metodepembayaran.updatemethod');

    Route::get('dashboard', 'Dashboard\HomeController@index')->name('dashboard.index');

    // Users
    Route::resource('user', 'Dashboard\Auth\UsersController');

    // Role
    Route::resource('role', 'Dashboard\Auth\RoleController');

    // Permission
    Route::resource('permission', 'Dashboard\Auth\PermissionController');

    // Artikel
    Route::resource('artikel', 'Dashboard\ArtikelController');

    // Regulasi
    Route::resource('regulasi', 'Dashboard\RegulasiController');

    // faq
    Route::resource('faq', 'Dashboard\Faq_pertanyaanController');

    // Data Pembayaran Invoice
    Route::get('invoice', 'Dashboard\HomeController@invoice')->name('admin.dashboard.invoice');
    Route::post('proses/invoice/{id}', 'Dashboard\HomeController@prosesInvoice')->name('admin.dashboard.invoice.proses');

    // Data Narasumber
    Route::get('narasumber', 'Dashboard\HomeController@dataNarasumber')->name('admin.dashboard.narasumber');
    Route::post('narasumber/verify/{id}', 'Dashboard\HomeController@verifyUserNarasumber')->name('admin.dashboard.narasumber.verify');

    // Data Profile Narasumber
    Route::get('narasumber/profile', 'Dashboard\HomeController@dataNarasumberProfile')->name('admin.dashboard.narasumber.profile');
    Route::post('narasumber/profile/{id}', 'Dashboard\HomeController@detailDataNarasumberProfile')->name('admin.dashboard.narasumber.profile.detail');
    Route::get('narasumber/profile/cv/{id}', 'Dashboard\HomeController@cvDataNarasumberProfile')->name('admin.dashboard.narasumber.profile.cv');
    Route::post('narasumber/profile/verify/{id}', 'Dashboard\HomeController@verifyDataNarasumberProfile')->name('admin.dashboard.narasumber.profile.verify');

    // Data Paket Zoom
    Route::get('message/zoom', 'Dashboard\HomeController@dataPaketZoom')->name('admin.dashboard.zoom');
    Route::post('message/zoom/{id}', 'Dashboard\HomeController@prosesDataPaketZoom')->name('admin.dashboard.zoom.proses');
});

Route::group(['middleware' => ['auth']], function () {
    // Update Profile
    Route::get('profile', 'DashboardUser\HomeController@profile')->name('profile');
    Route::post('profile/save', 'DashboardUser\HomeController@saveProfile')->name('profile.save');
    Route::post('profile/upload/save', 'DashboardUser\HomeController@uploadPicture')->name('profile.upload.save');
});

Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function () {
    // Dashboard User Membership
    Route::get('membership', 'DashboardUser\HomeController@registerMembership')->name('user.dashboard.membership');
    Route::post('save/membership', 'DashboardUser\HomeController@saveRegisterMembership')->name('user.dashboard.membership.save');
    Route::get('getProviders/{nama_method}', 'DashboardUser\HomeController@getProviders')->name('user.dashboard.membership.getProviders');
    Route::post('save/buktipembayaran', 'DashboardUser\HomeController@saveBuktiPembayaran')->name('user.dashboard.saveBuktiPembayaran');

    // Dashboard User Invoice
    Route::get('invoice', 'DashboardUser\HomeController@invoiceprofil')->name('user.dashboard.invoice');
    Route::get('invoiceprofil/laporan/{id}', 'DashboardUser\HomeController@laporan')->name('user.dashboard.cetak');

    // Dashboard User Kwitansi
    Route::get('kwitansi', 'DashboardUser\HomeController@kwitansiProfil')->name('user.dashboard.kwitansi');

    // Konsultasi Sekarang
    Route::get('konsultasi', 'DashboardUser\HomeController@konsultasi')->name('user.dashboard.konsultasi');
    // Konsultasi via Zoom
    Route::post('konsultasi/zoom', 'DashboardUser\HomeController@konsultasiZoom')->name('user.dashboard.konsultasi.zoom');
});

Route::group(['prefix' => 'narasumber', 'middleware' => ['role:narasumber']], function () {
    Route::get('profile', 'DashboardNarasumber\NarasumberController@profile')->name('narasumber.dashboard.profile');
    Route::post('profile/save', 'DashboardNarasumber\NarasumberController@saveProfile')->name('narasumber.dashboard.profile.save');
});

Route::group(['prefix' => 'chat', 'middleware' => ['auth']], function () {
    Route::get('/', 'Chat\HomeChatController@index')->name('dashboard.chat');

    // ROOMS
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/rooms/{bidang_code}', [RoomController::class, 'getBidang']);
    Route::post('/rooms', [RoomController::class, 'getManyBidang']);
    Route::post('/joinroom', [RoomController::class, 'join']);
    Route::post('/exitroom', [RoomController::class, 'exit']);

    // BIDANG
    Route::get('/bidang', [BidangController::class, 'index']);

    // LAST ONLINE
    Route::get('/lastonline/{online}', [NarasumberController::class, 'updateLastOnline']);

    // KEAHLIAN
    Route::get('/keahlian/{user}', [BidangController::class, 'keahlian']);

    // CHAT
    Route::get('/contacts', [ChatController::class, 'index']);
    Route::get('/messages', [ChatController::class, 'messages']);
    Route::post('/conversation', [ChatController::class, 'getMessageFor']);
    Route::post('/conversation/send', [ChatController::class, 'sendMessage']);
    Route::post('/conversation/uploadFile', [ChatController::class, 'uploadFile']);

    // TICKET
    Route::get('/getticket/{name}', [TicketController::class, 'show']);
    Route::post('/ticket', [TicketController::class, 'store']);

    // SALDO
    Route::get('/saldo/{user_id}', [HomeChatController::class, 'getSaldo']);
});
