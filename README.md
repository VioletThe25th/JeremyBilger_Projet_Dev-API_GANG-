# Gang -- Projet Dev API
projet dev api YNOV, consiste à avoir des informations sur des gangs d'une ville, à travers différents quartier, afin de voir quels gangs les contrôlent. Nous pouvons également voir plusieurs établissements de la ville, ainsi que les produits qu'ils vendent. 

## Installation de Laravel

Nous avons plusieurs comandes à lancer pour commencer notre projet Laravel :
```bash
composer install
```

Installation de Passport :
```bash
composer require laravel/passport
```
Transférer les nouvelles tables à notre base de données :
```bash
php artisan migrate
```
```bash
php artisan passport:install
```

## Bearer Token

La commande précédente nous donne les informations nécessaire pour récupérer le `bearer token`

Cela nous permet d'utiliser le `bearer token` sur ``Postman``, et de voir les informtaions que nous recherchons.

Pour pouvoir tester les différentes routes sur Postman, faire un get sur l'URL `/api/oauth/token` avec les informations suivantes dans le body : 

## Methodes CRUD :

Exemple sur la table product :
```php
// Route pour créer une nouvelle entrée dans une table en POST :
Route::POST('/products', [ProductController::class, 'store']);
//Route pour voir les données d'une entrée dans une table :
Route::get('/products/{id}', [ProductController::class, 'show']);
//Route pour mettre à jour un élément d'une table : 
Route::patch('/products/{product}', [ProductController::class, 'update']);
//Route pour supprimer un élément d'une table :
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
```

## Ensemble des routes :

```php
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
    Route::POST('/etablissements', [etablissementsController::class, 'store']);
    Route::POST('/quartiers', [QuartierController::class, 'store']);
    Route::POST('/gangs', [GangController::class, 'store']);

    //Route pour voir les données d'une entrée dans une table :
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/etablissements/{id}', [EtablissementController::class, 'show']);
    Route::get('/quartiers/{id}', [QuartierController::class, 'show']);
    Route::get('/gangs{id}', [GangController::class, 'show']);

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
```

J'ai envoyé une demande sur Postman pour vous ajouter à la collection qui permet de tester toutes les différentes routes, à l'adresse `yohan.tournadre@ynov.com`.