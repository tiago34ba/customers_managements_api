<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PlanController;


//use App\Http\Controllers\api\LayoutController;

use App\Http\Controllers\Api\ServicesController;



route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Rota dos clientes
Route::get('/cliente', [ClienteController::class, 'index']);
Route::resource('/cliente', ClienteController::class);
Route::get('cliente/{id}', [ClienteController::class, 'show']); 
Route::post('cliente', [ClienteController::class, 'store']); 
Route::put('clientesupdate/{id}', [ClienteController::class, 'update']);
Route::delete('clientedelete/{id}', [ClienteController::class, 'destroy']);


// Rotas dos Serviços
Route::get('/service', [ServicesController::class, 'index']);
Route::resource('/service', ServicesController::class);
Route::get('service/{id}', [ServicesController::class, 'show']); 
Route::post('service', [ServicesController::class, 'store']); 
Route::put('serviceupdate/{id}', [ServicesController::class, 'update']);
Route::delete('servicedelete/{id}', [ServicesController::class, 'destroy']);


Route::get('/grupo', [GrupoController::class, 'index']);
Route::get('/clientes-grupo/{idGrupo}', [GrupoController::class, 'findClitesGrupo']);

//route::resource('/dashboard', [DashboardController::class, 'index']);

Route::get('/plano', [PlanController::class, 'index']);
Route::resource('/plano', PlanController::class);
Route::get('plano/{id}', [PlanController::class, 'show']); 
Route::post('plano', [PlanController::class, 'store']); 
Route::put('planoupdate/{id}', [PlanController::class, 'update']);
Route::delete('planodelete/{id}', [PlanController::class, 'destroy']);


//Rota dos Produtos
Route::get('/products', [ProductController::class, 'index']); 
Route::get('products/{id}', [ProductController::class, 'show']); 
Route::post('products', [ProductController::class, 'store']); 
Route::put('productsupdate/{id}', [ProductController::class, 'update']);
Route::delete('productdelete/{id}', [ProductController::class, 'destroy']);

Route::get('/grupo', [GrupoController::class, 'index']);
Route::get('/produto-grupo/{idGrupo}', [GrupoController::class, 'findClitesGrupo']);
