<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeraEvento;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\IngressoController;
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
//LOGIN
Route::get('/', [UsuarioController::class, 'index'])->name('login.page');
Route::get('/login', [UsuarioController::class, 'index'])->name('login.page');
Route::post('/logar', [UsuarioController::class, 'auth'])->name('logar');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

//Cadatro
Route::get('/cadastrar', [UsuarioController::class, 'create']);
Route::post('/gerar_cadastro', [UsuarioController::class, 'store'])->name('gerarCadastro');

//DASHBOARD
Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/adicionar', [GeraEvento::class, 'store'])->name('adicionar');
Route::post('/gera-ingresso', [IngressoController::class, 'store'])->name('gera-ingresso');
