<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UsersController;
use App\Models\Institusi;
use App\Models\Peserta;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home');
})->name('home');

Route::get('gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('/peserta/cetak{id}', [PesertaController::class, 'cetak'])->name('peserta.cetak');

route::get('dashboard', [DashboardController::class, 'total'])->name('dashboard');

Route::get('users', [UsersController::class, 'users'])->name('users.show');
Route::get('users.create', [UsersController::class, 'create'])->name('users.create');
Route::post('users.store', [UsersController::class, 'store'])->name('users.store');
Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::get('peserta', [PesertaController::class, 'peserta'])->name('peserta.show');
Route::get('peserta.create', [PesertaController::class, 'create'])->name('peserta.create');
Route::post('peserta.store', [PesertaController::class, 'store'])->name('peserta.store');
Route::get('/peserta/{id}', [PesertaController::class, 'detail'])->name('peserta.detail');
Route::get('peserta/{peserta}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
Route::put('peserta/{peserta}', [PesertaController::class, 'update'])->name('peserta.update');
Route::delete('peserta/{peserta}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
Route::get('peserta.terima', [PesertaController::class, 'indexTerima'])->name('peserta.terima');
Route::get('peserta.tolak', [PesertaController::class, 'indexTolak'])->name('peserta.tolak');
Route::post('/peserta/{id}/terima', [PesertaController::class, 'terima'])->name('terima');
Route::post('/peserta/{id}/tolak', [PesertaController::class, 'tolak'])->name('tolak');


Route::get('institusi', [InstitusiController::class, 'institusi'])->name('institusi.show');
Route::get('institusi.create', [InstitusiController::class, 'create'])->name('institusi.create');
Route::post('institusi.store', [InstitusiController::class, 'store'])->name('institusi.store');
Route::get('institusi/{institusi}/edit', [InstitusiController::class, 'edit'])->name('institusi.edit');
Route::put('institusi/{institusi}', [InstitusiController::class, 'update'])->name('institusi.update');
Route::delete('institusi/{institusi}', [InstitusiController::class, 'destroy'])->name('institusi.destroy');

Route::get('absensi', function () {
    return view('absensi.show');
})->name('absensi');

Route::get('logbook', function () {
    return view('logbook.show');
})->name('logbook');

Route::get('register', function () {
    return view('auth.register');
})->name('auth.register');

// Route::get('users', function () {
//     return view('users.show');
// })->name('users.show');

