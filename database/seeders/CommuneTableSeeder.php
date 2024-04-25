<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $departement1 = Departement::where('nom' , 'ouémé')->first();
        $departement2 = Departement::where('nom' , 'littoral')->first();


        Commune::create([
            'nom' => 'Sèmè-Podji',
            'departement_id' => $departement1->id
        ]);

        Commune::create([
            'nom' => 'Sèmè-kraké',
            'departement_id' => $departement2->id

        ]);
    }
}
