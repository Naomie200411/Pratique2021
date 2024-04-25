<?php

namespace Database\Seeders;

use App\Models\Arrondissement;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arrondissement1 = Arrondissement::where('nom' , 'Arrondissement1')->first();
        $arrondissement2= Arrondissement::where('nom' , 'Arrondissement2')->first();


        Village::create([
            'nom' => 'agla',
            'arrondissement_id' => $arrondissement1->id
        ]);

        Village::create([
            'nom' => 'calavi',
            'arrondissement_id' => $arrondissement2->id

        ]);

    }
}
