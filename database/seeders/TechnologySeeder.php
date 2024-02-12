<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //array di partenza
        $technologies = ['HTML', 'CSS', 'Javascript', 'AdobeCreativeSuite', 'Vite', 'Vue', 'Bootstrap', 'Laravel', 'Glyphs', 'Cinema4D', 'PHP'];

        foreach($technologies as $technology) {
            //istanza di classe
            $new_technology = new Technology();
            //salvo dati in tabella nelle colonne
            $new_technology->title = $technology;
            $new_technology->slug = Str::of($technology)->slug('-');
            //salvo l'istanza creata
            $new_technology->save();
        }
    }
}
