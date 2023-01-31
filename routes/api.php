<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PortafolioController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('portafolios', PortafolioController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});


Route::resource('blog', BlogControlleroller::class);
Route::middleware('auth:sanctum')->get('/blogs', function (Request $request) {
    return $request->blogs();
});


// Ruta pública para el manejo de inicio de sesión del usuario
Route::post('/login', [AuthController::class, 'login'])->name('login');


// Grupo de rutas protegidas
Route::middleware(['auth:sanctum'])->group(function ()
{


// Ruta para el cierre de sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

