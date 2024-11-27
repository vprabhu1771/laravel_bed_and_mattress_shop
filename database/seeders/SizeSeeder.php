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
            ['name' => 'Single'],
            ['name' => 'Double'],
            ['name' => 'Queen'],
            ['name' => 'King'],
            ['name' => 'Custom'],
        ];
        
        foreach ($sizes as $row)
        {
            Size::create($row);
        }
    }
}
