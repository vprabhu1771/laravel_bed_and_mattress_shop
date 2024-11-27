<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products= [
            [
                'name' => 'Comfort Mattress',
                'description' => 'A soft and durable mattress.',
            ]
        ];

        foreach ($products as $row)
        {
            $row['slug'] = Str::slug($row['name']); // Convert name to slug
            
            Product::create($row);
        }
    }
}
