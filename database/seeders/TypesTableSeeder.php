<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        }
    }
}
