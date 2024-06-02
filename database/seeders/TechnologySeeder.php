<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use illuminate\Support\Str;



class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['html', 'css', 'javascript', 'vue-js', 'php', 'laravel'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology;
            $newTechnology->name = $technology;
            $newTechnology->slug_technology = Str::slug($technology, '-');
            $newTechnology->save();
        }
    }
}
