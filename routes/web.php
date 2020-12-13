<?php

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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });



Route::get('/', function () {
    $pemesanan = \App\Pemesanan::where('status', 'diterima')->get();
    return view('welcome', compact('pemesanan'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    // Route::get('/customer', 'CustomerController@index')->name('customer');
    Route::resource('customer', 'CustomerController');
    Route::resource('kendaraan', 'KendaraanController');
    Route::resource('rental', 'RentalController');
    Route::resource('pemesanan', 'PemesananController');

    Route::get('/profil', 'UserController@index')->name('profil');
    Route::get('/verifikasi/{id}', 'KendaraanController@verifikasi');
    Route::get('/penolakan/{id}', 'KendaraanController@penolakan');
    Route::get('/detail/{id}', 'KendaraanController@detail');
    Route::get('/terima/{id}', 'PemesananController@terima');
    Route::get('/tolak/{id}', 'PemesananController@tolak');
    Route::get('/pengaduan', 'PengaduanController@index');
    Route::resource('pengaduan', 'PengaduanController');
    Route::resource('tanggapan', 'TanggapanController');
});
Route::resource('detailKendaraan', 'detailController');
Route::post('/daftarRtl', 'UserController@store');
