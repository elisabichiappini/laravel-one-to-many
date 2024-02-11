<?php

namespace Database\Seeders;

use App\Models\Project;
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
        for ($i = 0; $i < 20; $i++) {
            //istanzio il progetto nuovo
            $project = new Project();
            //definisco le proprietà di ogni project
            $project->title = $faker->sentence(2);
            $project->slug = Str::of($project->title)->slug('-');
            $project->tools = $faker->sentence(2);
            $project->type = $faker->randomElement(['Back end','Fron end']);
            $project->description = $faker->text(300);
            $project->born = $faker->date();

            //salvo l'istanza creata
            $project->save();
        }
    }
}
