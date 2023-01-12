<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Api\V1\UserResource;
use App\Http\Controllers\Api\GangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\QuartierController;
use App\Http\Controllers\Api\EtablissementController;

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

Route::middleware('auth:api')->group(function(){

    Route::get('/', function (Request $request) {

        // return ['user' => 'test'];
        $user = new UserResource($request->user());
        return response()->json(['success' => true, 'msg' => 'SUCCESS', 'user' => $user], 200);
    });
    Route::get('/users', [UserController::class, 'index']);

    // Route pour voir les données des différentes tables en GET :
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/etablissements', [EtablissementController::class, 'index']);
    Route::get('/quartiers', [QuartierController::class, 'index']);
    Route::get('/gangs', [GangController::class, 'index']);
});

Route::post('/signup', [UserController::class, 'store']);
