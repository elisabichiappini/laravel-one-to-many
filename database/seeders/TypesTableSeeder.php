<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //array di partenza
        $types = ['Frontend', 'Backend', 'Fullstack', 'GraphicDesigner', 'Branding', 'Typeface', 'MotionDesign'];

        foreach($types as $type) {
            //istanza di classe
            $new_type = new Type();
            //salvo dati in tabella nelle colonne
            $new_type->title = $type;
            $new_type->slug = Str::of($type)->slug('-');
            //salvo l'istanza creata
            $new_type->save();
        }
    }
}
