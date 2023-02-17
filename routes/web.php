<?php

use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\UserController;
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
    return view('home', [
        "title" => "Dashboard"
    ]);
});

// Route::get('/user', [UserController::class, 'index']); //menampilkan halaman users
Route::resource('/user', DashboardUsersController::class); //menampilkan halaman users
// Route::get('/user/create', [DashboardUsersController::class, 'create']); //menampilkan halaman tambah data user

route::resource('/penghuni', PenghuniController::class); //menampilkan halaman penghuni
// Route::get('/penghuni/create', [PenghuniController::class, 'create']); //menampilkan halaman tambah data user

route::resource('/harga', HargaController::class); //menampilkan halaman Harga
// Route::get('/harga/create', [HargaController::class, 'create']); //menampilkan halaman create data Harga

route::resource('/fasilitas', FasilitasController::class); //menampilkan halaman Fasilitas
// Route::get('/fasilitas/create', [FasilitasController::class, 'create']); //menampilkan halaman create data fasilitas