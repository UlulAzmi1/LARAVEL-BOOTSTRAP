<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontController::class, 'index']);
Route::get('show/{id}',[FrontController::class, 'show']);
Route::get('register',[FrontController::class, 'register']);
Route::post('postregister',[FrontController::class, 'store']);
Route::get('login',[FrontController::class, 'login']);
Route::post('postlogin',[FrontController::class, 'postlogin']);
Route::get('logout',[FrontController::class, 'logout']);
Route::get('beli/{idmenu}', [CartController::class, 'beli']);
