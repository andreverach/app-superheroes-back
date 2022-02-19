<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Ruta::metodo('mi-url', [Controlador, 'funcion-del-controlador']);
Route::post('companies', [App\Http\Controllers\CompanyController::class, 'store']);

//mostrar
Route::get('companies/show', [App\Http\Controllers\CompanyController::class, 'show']);