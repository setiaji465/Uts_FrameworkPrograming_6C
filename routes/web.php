<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;


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


Route::get('/', [EmployeController::class, 'list']);

Route::get('/tambah-pegawai', function () {
    return view('tambah-pegawai');
});
Route::post('/simpan-pegawai', [EmployeController::class, 'simpan']);
Route::get('/hapus/{id}', [EmployeController::class, 'hapus']);
Route::get('/ubah/{id}', [EmployeController::class, 'ubah']);
Route::post('/ubah', [EmployeController::class, 'rubah']);
