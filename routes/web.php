<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ClienteController::class, 'index']);
Route::get('add-data', [ClienteController::class, 'addData']);
Route::post('store', [ClienteController::class, 'store']);
Route::get('edit-data/{id}', [ClienteController::class, 'edit']);
Route::post('update/{id}', [ClienteController::class, 'update']);
Route::get('delete/{id}', [ClienteController::class, 'delete']);
