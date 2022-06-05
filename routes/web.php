<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtributController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\WelcomeController;

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
/*
Route::get('/', function () {
    //return view('welcome');
    return view('v_welcome');
});
*/
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/atribut', [AtributController::class, 'index'])->name('atribut');
Route::get('/atribut/search', [AtributController::class, 'search'])->name('atribut.search');
Route::get('/atribut/detail/{id}', [AtributController::class, 'detail'])->name('atribut.detail');
Route::get('/atribut/add', [AtributController::class, 'add'])->name('atribut.add');
Route::post('/atribut/insert', [AtributController::class, 'insert'])->name('atribut.insert');
Route::get('/atribut/edit/{id}', [AtributController::class, 'edit'])->name('atribut.edit');
Route::post('/atribut/update/{id}', [AtributController::class, 'update'])->name('atribut.update');
Route::get('/atribut/delete/{id}', [AtributController::class, 'delete'])->name('atribut.delete');

Route::get('/kriteria', [AtributController::class, 'index_kriteria'])->name('kriteria');
Route::get('/kriteria/add/{id}', [AtributController::class, 'add_kriteria'])->name('kriteria.add');
Route::post('/kriteria/insert', [AtributController::class, 'insert_kriteria'])->name('kriteria.insert');
Route::get('/kriteria/edit/{id}', [AtributController::class, 'edit_kriteria'])->name('kriteria.edit');
Route::post('/kriteria/update/{id}', [AtributController::class, 'update_kriteria'])->name('kriteria.update');
Route::get('/kriteria/delete/{id}/', [AtributController::class, 'delete_kriteria'])->name('kriteria.delete');

Route::get('/data', [DatasetController::class, 'index'])->name('data');
Route::get('/data/search', [DatasetController::class, 'search'])->name('data.search');
Route::get('/data/detail/{id}', [DatasetController::class, 'detail'])->name('data.detail');
Route::get('/data/add', [DatasetController::class, 'add'])->name('data.add');
Route::post('/data/insert', [DatasetController::class, 'insert'])->name('data.insert');
Route::get('/data/edit/{id}', [DatasetController::class, 'edit'])->name('data.edit');
Route::post('/data/update/{id}', [DatasetController::class, 'update'])->name('data.update');
Route::get('/data/delete/{id}', [DatasetController::class, 'delete'])->name('data.delete');

Route::get('/dataset', [DatasetController::class, 'index_dataset'])->name('dataset');
Route::post('/dataset/insert', [DatasetController::class, 'insert_dataset'])->name('dataset.insert');

Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis');
Route::post('/analisis/hitung', [AnalisisController::class, 'hitung'])->name('analisis.hitung');

