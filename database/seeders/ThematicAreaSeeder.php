<?php

namespace Database\Seeders;  // Updated namespace

use Illuminate\Database\Seeder;
use App\Models\ThematicArea;  // Import the ThematicArea model

class ThematicAreaSeeder extends Seeder
{
    public function run()
    {
        // Seed data for thematic areas
        ThematicArea::create(['thematic_area_name' => 'Women Welfare']);
        ThematicArea::create(['thematic_area_name' => 'Youth Welfare']);
        ThematicArea::create(['thematic_area_name' => 'Child Welfare']);
    }
}