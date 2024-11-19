<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes= [
            [
                'name' => 'Single', 
                'dimensions' => '6x3 ft'
            ],
            [
                'name' => 'Queen', 
                'dimensions' => '6.5x5 ft'
            ],
            [
                'name' => 'King', 
                'dimensions' => '7x6 ft'
            ]
        ];

        foreach ($sizes as $row)
        {
            Size::create($row);
        }
    }
}
