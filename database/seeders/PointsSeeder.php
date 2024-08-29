<?php

namespace Database\Seeders;

use App\Models\Points;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Points::factory(40)->create();
    }
}
