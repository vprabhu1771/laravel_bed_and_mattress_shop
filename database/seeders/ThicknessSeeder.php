<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Thickness;

class ThicknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thickness = [
            ['value_in_inches' => 4, 'value_in_feet' => 0.33, 'value_in_cm' => 10.16],
            ['value_in_inches' => 6, 'value_in_feet' => 0.50, 'value_in_cm' => 15.24],
            ['value_in_inches' => 8, 'value_in_feet' => 0.67, 'value_in_cm' => 20.32],
            ['value_in_inches' => 10, 'value_in_feet' => 0.83, 'value_in_cm' => 25.40],
        ];

        foreach ($thickness as $row)
        {
            Thickness::create($row);
        }
    }
}
