<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Ruta::metodo('mi-url', [Controlador, 'funcion-del-controlador']);
Route::post('companies', [App\Http\Controllers\CompanyController::class, 'store']);

//mostrar un registro
Route::get('companies/{company}', [App\Http\Controllers\CompanyController::class, 'show']);

//mostrar todos
Route::get('companies', [App\Http\Controllers\CompanyController::class, 'index']);

//actualizar
Route::put('companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);

//eliminar 
Route::delete('companies/{company}', [App\Http\Controllers\CompanyController::class, 'destroy']);


//nuevas rutas
//companies
Route::apiResource('v1/companies', App\Http\Controllers\Api\v1\CompanyController::class);