<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\LocalizationController;

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

Route::get('lang/{lang}', [LocalizationController::class, 'setlang'])->name('lang');

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
    Route::patch('/etablissements/{etablissement}', [EtablissementController::class, 'update'])
        ->where('etablissement', '[0-9]+')
        ->name('etablissements.update');
    Route::patch('/quartiers/{quartier}', [QuartierController::class, 'update'])
        ->where('quartier', '[0-9]+')
        ->name('quartiers.update');
    Route::patch('/gangs/{gang}', [GangController::class, 'update'])
        ->where('gang', '[0-9]+')
        ->name('gangs.update');

    //Route pour supprimer les différentes entrées de la base de données
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
    Route::delete('/etablissements/{etablissement}', [EtablissementController::class, 'destroy'])
        ->name('etablissements.destroy');
    Route::delete('/quartiers/{quartier}', [QuartierController::class, 'destroy'])
        ->name('quartiers.destroy');
    Route::delete('/gangs/{gang}', [GangController::class, 'destroy'])
        ->name('gangs.destroy');

    //Route pour ajouter des entrées dans les différentes base de données
    //Requetes en get
    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');
    Route::get('/etablissements/create', [EtablissementController::class, 'create'])
        ->name('etablissements.create');
    Route::get('/quartiers/create', [QuartierController::class, 'create'])
        ->name('quartiers.create');
    Route::get('/gangs/create', [GangController::class, 'create'])
        ->name('gangs.create');

    //Requetes en post
    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');
    Route::post('/etablissements', [EtablissementController::class, 'store'])
        ->name('etablissements.store');
    Route::post('/quartiers', [QuartierController::class, 'store'])
        ->name('quartiers.store');
    Route::post('/gangs', [GangController::class, 'store'])
        ->name('gangs.store');
});
