<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $technologies = ['Weapon', 'Shielding', 'Energy', 'Hyperspace', 'Combustion', 'Impulse', 'Plasma', 'Graviton'];

        foreach ($technologies as $tech) {
            $technology = new Technology();
            $technology->name = $tech;
            $technology->slug = Str::slug($tech, '-');
            $technology->save();
        }


    }
}
