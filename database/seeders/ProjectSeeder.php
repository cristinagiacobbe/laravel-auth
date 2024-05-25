<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(4, true);
            $project->description = $faker->paragraph(5, true);
            $project->cover_image = $faker->imageUrl();
            $project->project_url = $faker->url();
            $project->slug = Str::of($project->title)->slug('-');
            $project->save();
        }
    }
}
