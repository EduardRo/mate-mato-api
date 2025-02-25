<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\ClasaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RezultatController;
use App\Http\Controllers\TeorieController;
use App\Http\Controllers\AbonamentController;

use App\Http\Controllers\AuthController;

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// OAuth2 routes
Route::get('/auth/{provider}', [AuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);

// Protected route example
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/serii/{codclasa}', [SerieController::class, 'index']);

Route::get('/clase',[ClasaController::class,'index']);

Route::get('/test/{codserie}',[TestController::class, 'test']);



Route::get('/teorie/{codclasa}',[TeorieController::class, 'serii']);

Route::get('/teorie/{codclasa}/{codserie}',[TeorieController::class, 'teste']);

Route::get('/abonamente', [AbonamentController::class, 'index']);

// Rezultate Controller paths

//Route::post('/save-resultat', [RezultatController::class, 'store'])->middleware('auth:api');
Route::post('/save-resultat', [RezultatController::class, 'store'])->middleware('auth:api');

// Afisare calculate score
Route::post('/calculate-score', [RezultatController::class, 'ScoreCalculation'])->middleware('auth:api');

Route::get('/rezultate/{id}/{codserie}', [RezultatController::class, 'rezultate_user_serii']);

Route::get('/rezultate/{id}', [RezultatController::class, 'show']);

// Route for accessing AI and return something.

