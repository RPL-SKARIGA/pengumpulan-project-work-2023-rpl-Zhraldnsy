<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaBaruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;

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

Route::get('/loginadmin', [AdminController::class, 'showlogin'])->name('admin.login');
Route::post('/admin/login', [SessionController::class, 'loginAdmin'])->name('admin.login.submit');

Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/konfirmasicasis',[CalonSiswaController::class,'konfirmasi'])->name('casis.konfirmasi');
Route::get('/konfirmasicasis/{id}', [CalonSiswaController::class, 'konfirmasiproses'])->name('casis.konfirmasiproses');
Route::get('/casis', [CalonSiswaController::class, 'show'])->name('casis.show');
Route::get('/casis-delete/{id}', [CalonSiswaController::class,'delete'])->name('casis.delete');//hapus data
Route::get('/casis-detail/{id}', [CalonSiswaController::class,'detail'])->name('casis.detail');
Route::get('/casis-edit/{id}', [CalonSiswaController::class,'edit'])->name('casis.edit');
Route::put('/casis-update/{id}', [CalonSiswaController::class, 'update'])->name('casis.update');

Route::get('/siswabaru', [SiswaBaruController::class, 'index'])->name('siswabaru.index');//form
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');//menampilkan index jurusan
Route::get('/jurusan-add', [JurusanController::class,'create'])->name('jurusan.create');//menampilkan form tambah jurusan
Route::post('/jurusan/store', [JurusanController::class,'store'])->name('jurusan.store');//kirim database
Route::get('/jurusan-delete/{id}', [JurusanController::class,'delete'])->name('jurusan.delete');//hapus data
Route::get('/jurusan-edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');//tampil form edit
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');//fungsi update data

Route::get('/eskul', [EskulController::class, 'index'])->name('eskul.index');
Route::get('/eskul-add', [EskulController::class, 'create'])->name('eskul.create');
Route::post('/eskul/store', [EskulController::class,'store'])->name('eskul.store');
Route::get('/eskul-delete/{id}', [EskulController::class,'delete'])->name('eskul.delete');
Route::get('/eskul-edit/{id}', [EskulController::class, 'edit'])->name('eskul.edit');
Route::put('/eskul/update/{id}', [EskulController::class, 'update'])->name('eskul.update');
});



Route::get('/login', [SessionController::class, 'index'])->name('login.index');
Route::post('/login', [SessionController::class, 'login'])->name('login.login');
Route::post('/create', [SessionController::class, 'create'])->name('create.create');
Route::get('/logout', [SessionController::class, 'logout'])->name('login.logout');

Route::get('/', [CalonSiswaController::class,'home'])->name('home.home')->middleware('isLogin');//User index
Route::get('/form', [CalonSiswaController::class, 'index'])->name('siswa.index')->middleware('isLogin');//form
Route::get('/status', [CalonSiswaController::class,'status'])->name('siswa.status')->middleware('isLogin');
Route::post('/siswa/store', [CalonSiswaController::class, 'store'])->name('siswa.store');


