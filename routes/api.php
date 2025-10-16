<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\Modules\UrlShortenerController;
use App\Http\Middleware\Module\CheckModuleActive;
use App\Http\Middleware\Module\CheckModuleExist;
use App\Http\Middleware\Module\CheckUrlExist;
use App\Models\UrlShortener;

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

Route::get("/s/{code}", [UrlShortenerController::class, "redirectToUrl"]);

Route::post("/shorten", [UrlShortenerController::class, "create"])
    ->middleware('auth:sanctum');

Route::get("/links", [UrlShortenerController::class, "index"])
    ->middleware('auth:sanctum')
    ->middleware(CheckModuleExist::class);

Route::delete("/links/{id}", [UrlShortenerController::class, "destroy"])
    ->middleware('auth:sanctum')
    ->middleware(CheckUrlExist::class);


// Module routes
Route::get("/modules", [ModuleController::class, "index"]);

Route::post("/modules/{id}/activate", [ModuleController::class, "activate"])
    ->middleware('auth:sanctum')
    ->middleware(CheckModuleExist::class);

Route::post("/modules/{id}/desactivate", [ModuleController::class, "desactivate"])
    ->middleware('auth:sanctum')
    ->middleware(CheckModuleExist::class);