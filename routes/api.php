<?php

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('contacto',[ClienteController::class,'index']);
Route::get('contacto/{id}',[ClienteController::class,'find']);
Route::post('create',[ClienteController::class,'create']);
Route::put('update/{id}',[ClienteController::class,'update']);
Route::post('delete/{/id}',[ClienteController::class,'delete']);

