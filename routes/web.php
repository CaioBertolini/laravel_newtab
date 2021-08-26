<?php

use App\Http\Controllers\Candidatura;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vaga;
use App\Http\Controllers\Pessoa;

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
    return view('welcome');
});

Route::get('/v1/vagas/cadastro', [Vaga::class, 'create']);
Route::get('/v1/pessoas/cadastro', [Pessoa::class, 'create']);
Route::get('/v1/candidatura/cadastro', [Candidatura::class, 'create']);