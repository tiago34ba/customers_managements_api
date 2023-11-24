<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\GrupoController;

route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente', [ClienteController::class, 'index']);
Route::resource('/cliente', ClienteController::class);

Route::get('/grupo', [GrupoController::class, 'index']);
Route::get('/clientes-grupo/{idGrupo}', [GrupoController::class, 'findClitesGrupo']);