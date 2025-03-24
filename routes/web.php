<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/level', [LevelController::class, 'create'])->name('level.create');
Route::post('/level/store', [LevelController::class, 'store'])->name('level.store');

Route::get('/user', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::resource('m_user', POSController::class);
// Route::get('/m_user', [POSController::class, 'index'])->name('m_user.index');
// Route::get('/m_user/create', [POSController::class, 'create'])->name('m_user.create');
// Route::post('/m_user/store', [POSController::class, 'store'])->name('m_user.store');
// Route::get('/m_user/{id}', [POSController::class, 'show'])->name('m_user.show');
// Route::get('/m_user/{id}/edit', [POSController::class, 'edit'])->name('m_user.edit');
// Route::put('/m_user/{id}', [POSController::class, 'update'])->name('m_user.update');
// Route::delete('/m_user/{id}', [POSController::class, 'destroy'])->name('m_user.destroy');
Route::get('/', [WelcomController::class, 'index']);