<?php

namespace Database\Seeders;  // Updated namespace

use Illuminate\Database\Seeder;
use App\Models\VswaHeadQuarter;  // Import the VswaHeadQuarter model

class VswaHeadQuarterSeeder extends Seeder
{
    public function run()
    {
        // Seed data for VSWA Head Quarters
        VswaHeadQuarter::create(['vswa_hq_name' => 'Bannu']);
        VswaHeadQuarter::create(['vswa_hq_name' => 'Kohat']);
        VswaHeadQuarter::create(['vswa_hq_name' => 'Peshawar']);
    }
}