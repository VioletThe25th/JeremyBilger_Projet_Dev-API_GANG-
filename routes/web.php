<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\EtablissementController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['isAdmin'])->group(function(){

    //Route pour afficher les différentes base de données
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');
    Route::get('/etablissements', [EtablissementController::class, 'index'])
        ->name('etablissements.index');
    Route::get('/quartiers', [QuartierController::class, 'index'])
        ->name('quartiers.index');
    Route::get('/gangs', [GangController::class, 'index'])
        ->name('gangs.index');

    //Route pour modifier les différentes base de données
    //Requetes en get
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->where('product', '[0-9]+')
        ->name('products.edit');
    Route::get('/etablissements/{etablissement}/edit', [EtablissementController::class, 'edit'])
        ->where('etablissement', '[0-9]+')
        ->name('etablissements.edit');
    Route::get('/quartiers/{quartier}/edit', [QuartierController::class, 'edit'])
        ->where('quartier', '[0-9]+')
        ->name('quartiers.edit');
    Route::get('/gangs/{gang}/edit', [GangController::class, 'edit'])
        ->where('gang', '[0-9]+')
        ->name('gangs.edit');

    //Requetes en patch
    Route::patch('/products/{product}', [ProductController::class, 'update'])
        ->where('product', '[0-9]+')
        ->name('products.update');

    //Route pour supprimer les différentes base de données
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
    Route::delete('/etablissements/{etablissement}', [EtablissementController::class, 'destroy'])
        ->name('etablissements.destroy');
    Route::delete('/quartiers/{quartier}', [QuartierController::class, 'destroy'])
        ->name('quartiers.destroy');
    Route::delete('/gangs/{gang}', [GangController::class, 'destroy'])
        ->name('gangs.destroy');
});
