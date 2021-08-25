<?php

use App\Http\Controllers\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vaga;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/v1/vagas',[Vaga::class,'store'])->name('vagas_cadastro');
Route::post('/v1/pessoas',[Pessoa::class,'store'])->name('pessoas_cadastro');
