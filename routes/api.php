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

Route::resources(['services' => ServiceController::class]);
Route::get('/services/search/name/{name}', [ServiceController::class, 'searchName']);
Route::get('/services/search/name/last/{name}', [ServiceController::class, 'searchNameLast']);

Route::resources(['experiences' => ExperienceController::class]);
Route::get('/experiences/user/{user_id}', [ExperienceController::class, 'GetByUser']);

Route::resources(['users' => UserController::class]);
Route::get('/users/search/name/{name}', [UserController::class, 'searchName']);
Route::post('/authentication', [usercontroller::class, 'authenticate']);

Route::resources(['publications' => PublicationController::class]);
Route::get('/publications/user/{user_id}', [PublicationController::class, 'GetByUser']);

Route::resources(['perfils' => PerfilController::class]);
Route::get('/perfils/user/{user_id}', [PerfilController::class, 'GetByUser']);




