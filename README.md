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