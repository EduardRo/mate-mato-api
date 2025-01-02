<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\ClasaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RezultatController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/serii/{codclasa}', [SerieController::class, 'index']);

Route::get('/clase',[ClasaController::class,'index']);

Route::get('/test/{codserie}',[TestController::class, 'test']);

Route::post('/save/results',[RezultatController::class, 'store']);
