<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i < 50 ; $i++){
            $new_project = new Project();
            $new_project->title = $faker->sentence();
            $new_project->slug = Project::generateSlug($new_project->title);
            $new_project->text = $faker->paragraph();
            $new_project->date = $faker->date();


            $new_project->save();
        }
    }
}
