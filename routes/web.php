<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});


Route::get('/', function () {
    // Implemente aqui a lógica para obter detalhes da API, como status da conexão, horário do último CRON, tempo online, uso de memória, etc.
    

    
    return response()->json(['message' => 'API is running']);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{code}', [ProductController::class, 'show']);
Route::put('/products/{code}', [ProductController::class, 'update']);
Route::delete('/products/{code}', [ProductController::class, 'delete']);

Route::resource('products', ProductController::class);

Route::post('/products/import', [ProductController::class, 'importData']);

