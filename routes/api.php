<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Middleware\CheckModuleActive;
use App\Http\Middleware\CheckModuleExist;


Route::post("/register", [AuthController::class, "register"])
    ->name("register");

Route::post("login", [AuthController::class, "login"])
    ->name("login");


Route::post("logout", [AuthController::class, "logout"])
    ->name("logout")
    ->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Link shortener routes

Route::post("/shorten", []);



// Module routes
Route::get("/modules", [ModuleController::class, "index"]);

Route::post("/modules/{id}/activate", [ModuleController::class, "activate"])
    ->middleware('auth:sanctum')
    ->middleware(CheckModuleExist::class);

Route::post("/modules/{id}/desactivate", [ModuleController::class, "desactivate"])
    ->middleware('auth:sanctum')
    ->middleware(CheckModuleExist::class);