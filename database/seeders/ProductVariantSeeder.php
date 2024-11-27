<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Size;
use App\Models\Thickness;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();
        $thicknesses = Thickness::all();
        $products = Product::all();

        $productVariants = [
            // Single Variants
            [
                'product_id' => $products->where('name', 'Comfort Mattress')->first()->id,
                'size_id' => $sizes->where('name', 'Single')->first()->id,
                'thickness_id' => $thicknesses->where('value_in_inches', '4')->first()->id,
                'dimension_in_inches' => '72x30', 
                'dimension_in_feet' => '6x2.5', 
                'dimension_in_cm' => '183x76',
                // 'product_variant_code' => '7237'
                'price' => '6000'
            ],
            [
                'product_id' => $products->where('name', 'Comfort Mattress')->first()->id,
                'size_id' => $sizes->where('name', 'Single')->first()->id,
                'thickness_id' => $thicknesses->where('value_in_inches', '4')->first()->id,
                'dimension_in_inches' => '72x36', 
                'dimension_in_feet' => '6x3', 
                'dimension_in_cm' => '183x91',
                // 'product_variant_code' => '8007'
                'price' => '8000'
            ],
            // Add more "Single" variants...

            // Double Variants
            [
                'product_id' => $products->where('name', 'Comfort Mattress')->first()->id,
                'size_id' => $sizes->where('name', 'Double')->first()->id,
                'thickness_id' => $thicknesses->where('value_in_inches', '4')->first()->id,
                'dimension_in_inches' => '72x48', 
                'dimension_in_feet' => '6x4', 
                'dimension_in_cm' => '183x122',
                // 'product_variant_code' => '9855'
                'price' => '10000'
            ],
            // // Add more "Double" variants...

            // // Queen Variants
            [
                'product_id' => $products->where('name', 'Comfort Mattress')->first()->id,
                'size_id' => $sizes->where('name', 'Queen')->first()->id,
                'thickness_id' => $thicknesses->where('value_in_inches', '4')->first()->id,
                'dimension_in_inches' => '72x60', 
                'dimension_in_feet' => '6x5', 
                'dimension_in_cm' => '183x152',
                // 'product_variant_code' => '9855'
                'price' => '12000'
            ],
            // Add more "Queen" variants...
        ];

        foreach ($productVariants as $variant) {
            ProductVariant::create($variant);
        }
    }
}
