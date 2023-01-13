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

    // Route pour créer une nouvelle entrée dans une table en POST :
    Route::POST('/products', [ProductController::class, 'store']);
    Route::POST('/etablissements', [EtablissementController::class, 'store']);
    Route::POST('/quartiers', [QuartierController::class, 'store']);
    Route::POST('/gangs', [GangController::class, 'store']);

    //Route pour voir les données d'une entrée dans une table :
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/etablissements/{id}', [EtablissementController::class, 'show']);
    Route::get('/quartiers/{id}', [QuartierController::class, 'show']);
    Route::get('/gangs/{id}', [GangController::class, 'show']);

    //Route pour mettre à jour un élément d'une table : 
    Route::patch('/products/{product}', [ProductController::class, 'update']);
    Route::patch('/etablissements/{etablissement}', [EtablissementController::class, 'update']);
    Route::patch('/quartiers/{quartier}', [QuartierController::class, 'update']);
    Route::patch('/gangs/{gang}', [GangController::class, 'update']);

    //Route pour supprimer un élément d'une table :
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::delete('/etablissements/{etablissement}', [EtablilssementController::class, 'destroy']);
    Route::delete('/quartiers/{quartier}', [QuartierController::class, 'destroy']);
    Route::delete('/gangs/{gang}', [GangController::class, 'destroy']);
});

Route::post('/signup', [UserController::class, 'store']);
