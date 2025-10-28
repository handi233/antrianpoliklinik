<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApamController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PoliUmumController;
use App\Http\Controllers\CekKontrolController;
use App\Http\Controllers\displaypoliklinik;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Route untuk aplikasi:
| - Login/logout
| - Halaman home (akses data stok)
| - Input data barang
| - Hapus data barang
|
*/

// Redirect root ke login
Route::get('/', function () {
    return redirect('login');
});

// Route login
Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route logout
Route::post('/logout', function () {
    Auth::logout(); // Keluar dari auth guard
    request()->session()->invalidate(); // Hancurkan session
    request()->session()->regenerateToken(); // Regenerasi CSRF token

    return redirect('/login'); // Redirect ke login
})->name('logout');

// Group route yang harus login (middleware auth)
Route::middleware('auth')->group(function () {

    // Halaman  HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [HomeController::class, 'callAntrian'])->name('home.call');
    Route::post('/home/controlcall', [HomeController::class, 'callAntrianKontrol'])->name('control.call');



    //MODUL ANJUNGAN POLI UMUM

    // Menampilkan halaman anjungan
    Route::get('/apam', [ApamController::class, 'index'])->name('apam');
    // Print Resi Poli Umum (simpan antrian)
    Route::post('/poliumumprint', [PoliUmumController::class, 'print'])->name('poliumumprint');
    // Tampilkan halaman cetak berdasarkan ID
    Route::get('/poliumumprint/{id}', [PoliUmumController::class, 'printt'])->name('poliumumprintt');
    Route::get('/poliumumprint', [PoliUmumController::class, 'index']);


    //MODUL ANJUNGAN CEK KONTROL
    Route::match(['get', 'post'], '/cekkontrolprint', [CekKontrolController::class, 'index',])->name('cekkontrolprint');

    //MODUL DISPLAY POLIKLINIK
    Route::match(['get', 'post'], '/displaypoliklinik', [displaypoliklinik::class, 'index'])->name('displaypoliklinik');



    //MODUL SETTINGS

    //Modul Setting
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    //Modul Settings Delete
    Route::delete('/settings', [SettingsController::class, 'del'])->name('settings.del');
    //Modul Settings Update
    Route::put('/settings/{id}', [SettingsController::class, 'update'])->name('settings.update');



    //MODUL USERS

    //Modul Users
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    //Modul Users Post
    Route::post('/users', [UsersController::class, 'input'])->name('users.input');
    //Modul Users Delete
    Route::delete('/users', [UsersController::class, 'del'])->name('users.del');

    //MODUL HELP

    //Modul Help
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});
