<?php

use App\Http\Controllers\Backend\RegisterController ;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataGuruController;
use App\Http\Controllers\Backend\DataPenggunaController;
use App\Http\Controllers\Backend\KriteriaController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SubkriteriaController;
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

Route::get('/', function () {
    return view('backend/autentikasi.login');
});
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/{id}',[ProfileController::class, 'update'])->name('updateprofile');

        /*Start Data Pengguna */
        Route::get('/datapengguna', [DataPenggunaController::class, 'index'])->name('datapengguna');
        /* Route::post('/datapengguna{id}', [DataPenggunaController::class, 'edit'])->name('editdatapengguna'); */
        Route::post('/datapengguna', [DataPenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('/fetch-user', [DataPenggunaController::class, 'fetchuser']);
        Route::get('/edit-user/{id}',[DataPenggunaController::class, 'edit']);
        Route::put('/update-user/{id}',[DataPenggunaController::class, 'update']);
        Route::delete('/delete-user/{id}',[DataPenggunaController::class, 'destroy']);
        /* End Data Pengguna */

        /* Start Data Guru */
        Route::get('/dataguru', [DataGuruController::class, 'index'])->name('dataguru');
        Route::get('/fetch-guru', [DataGuruController::class, 'fetchguru']);
        Route::get('/edit-guru/{id}',[DataGuruController::class, 'edit']);
        Route::post('/update-guru/{id}',[DataGuruController::class, 'update'])->name('update.guru');
        Route::delete('/delete-guru/{id}',[DataGuruController::class, 'destroy']);
        /* End Data Guru */

        /* Start Data Kriteria */
        Route::get('/datakriteria', [KriteriaController::class, 'index'])->name('datakriteria');
        Route::post('/datakriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('/fetch-kriteria', [KriteriaController::class, 'fetchkriteria']);
        Route::get('/edit-kriteria/{id}',[KriteriaController::class, 'edit'])->name('editkriteria');
        Route::post('/update-kriteria/{id}',[KriteriaController::class, 'update'])->name('update.kriteria');
        Route::delete('/delete-kriteria/{id}',[KriteriaController::class, 'destroy']);
        /* End Data Kriteria */

        /* Start Data Subkriteria */
        Route::get('/datasubkriteria', [SubkriteriaController::class, 'index'])->name('datasubkriteria');
        Route::get('/show-subkriteria/{id}',[SubkriteriaController::class, 'show'])->name('showkriteria');
        Route::get('/fetch-subkriteria/{id}', [SubkriteriaController::class, 'fetchsubkriteria']);
        Route::get('/edit-subkriteria/{id}',[SubkriteriaController::class, 'edit'])->name('editsubkriteria');
        Route::post('/update-subkriteria/{id}',[SubkriteriaController::class, 'update'])->name('update.subkriteria');
        Route::post('/datasubkriteria', [SubkriteriaController::class, 'store'])->name('subkriteria.store');
        Route::delete('/delete-subkriteria/{id}',[SubkriteriaController::class, 'destroy']);
        /* End Data Subkriteria */
    });
    Route::group(['middleware' => ['cek_login:guru']], function () {
        Route::get('/dashboardguru', [DashboardController::class, 'index'])->name('dashboardguru');
        Route::get('/profileguru', [ProfileController::class, 'index'])->name('profileguru');
        Route::post('/profileguru/{id}',[ProfileController::class, 'update'])->name('updateprofileguru');
    });
});
Route::get('/masukLogin', [LoginController::class, 'index'])->name('masuklogin');
Route::post('/authenticate', [LoginController::class, 'masukLogin'])->name('masukLogin');
Route::post('/keluarlogout', [LoginController::class, 'logout'])->name('keluarlogout');
Route::get('/daftarregister', [RegisterController::class, 'index'])->name('daftarregister');
Route::post('/simpanregistrasi', [RegisterController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
