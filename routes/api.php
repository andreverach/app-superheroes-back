<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\HeroController as HeroV1;
use App\Http\Controllers\Api\v1\StatController as StatV1;
use App\Http\Controllers\Api\v1\SkillController as SkillV1;

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

//heroes
Route::apiResource('v1/heroes', HeroV1::class);

//stats
Route::apiResource('v1/stats', StatV1::class);

//skills
Route::apiResource('v1/skills', SkillV1::class);