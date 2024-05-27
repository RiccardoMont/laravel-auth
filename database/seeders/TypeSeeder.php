<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $types = ['new framework', 'app mobile', 'app desktop', 'new plug-in', 'update existing framework'];

        foreach ($types as $type) {
            $typology = new Type();
            $typology->name = $type;
            $typology->slug = Str::slug($type, '-');
            $typology->save();
        }

    }
}
