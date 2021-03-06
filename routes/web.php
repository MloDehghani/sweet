<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;
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

Route::get('/',[CategoryController::class ,'home']);

Route::post('/categories/',[CategoryController::class ,'store'])->middleware('auth');
Route::get('/categories/create',[CategoryController::class ,'create'])->middleware('auth');
Route::get('/categories/{category}',[CategoryController::class ,'show']);
Route::get('/categories/',[CategoryController::class ,'index']);

Route::get('/poling/{category}',[CategoryController::class , 'poling']);


Route::post('/cards/',[CardController::class , 'store'])->middleware('auth');
Route::post('/cards/{card}/updatescore/',[CardController::class , 'updateScore']);
Route::get('/cards/create',[CardController::class , 'create'])->middleware('auth');
Route::get('/cards/',[CardController::class , 'index']);
Route::get('/cards/{card}',[CardController::class , 'show']);
Route::delete('/cards/{post}',[CardController::class , 'delete'])->name('cards.delete')->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
