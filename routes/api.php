<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\ClienteController;
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

// Route::get('register', [ApiAuthController::class, 'register']);
// Route::get('login', [ApiAuthController::class, 'login']);

// Route::middleware(['auth:api-clientes', /*'check.status'*/])->group(function () {
//     Route::apiResources('agendamento', [AgendamentoController::class]);
//     Route::apiResources('cliente', [ClienteController::class]);
// });

// Route::middleware(['auth:api-barbeiros', /*'check.status'*/])->group(function () {
//     Route::apiResources('agendamento', [AgendamentoController::class]);
//     Route::apiResources('barbeiro', [BarbeiroController::class]);
// });
