<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DevicesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/login','login');
Route::post('/Creation/Compte', [UserController::class, 'createUser']);
Route::post('/Connexion/Verification', [UserController::class, 'connectUser']);
Route::get('/deconnecte', [UserController::class, 'deconnectUser']);
Route::get('/register', [UserController::class, 'index']);
Route::get('/added', [DevicesController::class, 'index']);
Route::post('/ajout', [DevicesController::class, 'added']);
Route::post('/Myequipement', [DevicesController::class, 'modify']);







