<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PerfilController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::delete('/services/{id}', [ServiceController::class, 'delete']);
Route::post('/services', [ServiceController::class, 'create']);
Route::put('/services', [ServiceController::class, 'update']);
Route::get('/services/search/name/{name}', [ServiceController::class, 'searchName']);
Route::get('/services/search/name/last/{name}', [ServiceController::class, 'searchNameLast']);

Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/experiences/{id}', [ExperienceController::class, 'show']);
Route::delete('/experiences/{id}', [ExperienceController::class, 'delete']);
Route::post('/experiences', [ExperienceController::class, 'create']);
Route::put('/experiences', [ExperienceController::class, 'update']);
Route::get('/experiences/user/{user_id}', [ExperienceController::class, 'GetByUser']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/users', [UserController::class, 'update']);
Route::get('/users/search/name/{name}', [UserController::class, 'searchName']);

Route::get('/publications', [PublicationController::class, 'index']);
Route::get('/publications/{id}', [PublicationController::class, 'show']);
Route::delete('/publications/{id}', [PublicationController::class, 'delete']);
Route::post('/publications', [PublicationController::class, 'create']);
Route::put('/publications', [PublicationController::class, 'update']);
Route::get('/publications/user/{user_id}', [PublicationController::class, 'GetByUser']);

Route::get('/perfils', [PerfilController::class, 'index']);
Route::get('/perfils/{id}', [PerfilController::class, 'show']);
Route::delete('/perfils/{id}', [PerfilController::class, 'delete']);
Route::post('/perfils', [PerfilController::class, 'create']);
Route::put('/perfils', [PerfilController::class, 'update']);
Route::get('/perfils/user/{user_id}', [PerfilController::class, 'GetByUser']);



