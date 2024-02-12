<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //svuoto la tabella projects
        Project::truncate();

        for ($i = 0; $i < 20; $i++) {
            //creo un numero random alla types di associatione
            $type = Type::inRandomOrder()->first();
            //istanzio il progetto nuovo
            $project = new Project();
            //definisco le proprietà di ogni project
            $project->title = $faker->sentence(2);
 
            $project->slug = Str::of($project->title)->slug('-');
            $project->tools = $faker->sentence(2);
            $project->description = $faker->text(300);
            $project->born = $faker->date();

            //salvo l'istanza creata
            $project->save();
        }
    }
}
