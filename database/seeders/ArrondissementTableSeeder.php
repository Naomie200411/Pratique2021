<?php

namespace Database\Seeders;

use App\Models\Arrondissement;
use App\Models\Commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArrondissementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commune1 = Commune::where('nom' , 'Sèmè-Podji')->first();
        $commune2= Commune::where('nom' , 'Sèmè-kraké')->first();


        Arrondissement::create([
            'nom' => 'Arrondissement1',
            'commune_id' => $commune1->id
        ]);

        Arrondissement::create([
            'nom' => 'Arrondissement2',
            'commune_id' => $commune2->id
        ]);
    }
}
