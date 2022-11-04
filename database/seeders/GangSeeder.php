<?php

namespace Database\Seeders;

use App\Models\Gang;
use App\Models\Product;
use App\Models\Quartier;
use App\Models\Etablissement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gang::factory(10)
            ->has(Etablissement::factory()->count(random_int(1, 5)))
            ->has(Quartier::factory()->count(1))
            ->has(Product::factory()->count(random_int(1, 8)))
            ->create();
    }
}
