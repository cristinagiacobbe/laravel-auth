<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use illuminate\support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['front-end', 'backend', 'full-stack'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug_type = Str::of($newType->name)->slug('-');
            $newType->save();
        }
    }
}
