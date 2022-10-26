<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\LivroController;

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
Route::resource('contatos', ContatosController::class);
Route::resource('emprestimos', EmprestimosController::class);

Route::resource('livros', LivroController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
