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
        // Gang::factory(10)
        //     ->has(Quartier::factory()->count(1)
        //         ->has(Etablissement::factory(random_int(1, 10))))
        //     ->has(Product::factory()->count(random_int(1, 8)))
        //     ->create();

        Gang::factory(10)->create()->each(function($gang){
            Quartier::factory()->count(random_int(0, 3))->create(['gang_id'=>$gang->id])->each(function($quartier){
                Etablissement::factory()->count(random_int(1, 4))->create(['quartier_id'=>$quartier->id])->each(function($etablissement){
                    Product::factory()->count(random_int(1, 3))->create(['etablissement_id'=>$etablissement->id]);
                });
            });
        });
    }
}
