<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//http://127.0.0.1:8000/api/visits
Route::get('/visits',[App\Http\Controllers\API\VisitController::class,'index'])->name('visits.index');
Route::post('/visits',[App\Http\Controllers\API\VisitController::class,'store'])->name('visits.store');
Route::get('/visits/{visit}',[App\Http\Controllers\API\VisitController::class,'show'])->name('visits.show');
Route::get('/visits/{visit}/delete',[App\Http\Controllers\API\VisitController::class,'delete'])->name('visits.delete');