<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\GerenteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente', [ClienteController::class, 'index']);
Route::resource('/cliente', ClienteController::class);

Route::get('/grupo', [GrupoController::class, 'index']);
Route::get('/clientes-grupo/{idGrupo}', [GrupoController::class, 'findClitesGrupo']);