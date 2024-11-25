<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Inches'],
            ['name' => 'Feet'],
            ['name' => 'cm'],
        ];

        foreach ($units as $row)
        {
            Unit::create($row);
        }
    }
}
