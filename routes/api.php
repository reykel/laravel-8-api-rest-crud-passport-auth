<?php

use App\Actions\JsonApiAuth\AuthKit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InstrumentosController;
use App\Http\Controllers\API\InventarioController;

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

Route::apiResource('/instrumento', InstrumentosController::class)->only([
     'index', 'show', 'store','update'
    ])->middleware('auth:api');
    
Route::apiResource('/instrumento', InstrumentosController::class)->only([
    'destroy'
    ])->middleware(['auth:api', 'scope:admin-ceo']);

    Route::apiResource('/inventario', InventarioController::class)->only([
        'index', 'show', 'store','update'
       ])->middleware('auth:api');
       
   Route::apiResource('/inventario', InventarioController::class)->only([
       'destroy'
       ])->middleware(['auth:api', 'scope:admin-ceo']);

require __DIR__ . '/json-api-auth.php';


