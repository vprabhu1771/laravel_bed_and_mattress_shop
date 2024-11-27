<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Thickness;

use App\Models\Product;

use App\Models\ProductVariant;

class MattressController extends Controller
{
    // Mattress List
    public function index(Request $request)
    {

        $data = [
            'product' => Product::all()
        ];

        return view('frontend/mattress/list/type1', $data);
    }

    // Mattress Detail
    public function show($id)
    {
        try {
            
            $sizes = Size::all();
            
            $units = Unit::all();

            $thicknesses = Thickness::all();

            $data = [
                'sizes' => $sizes,
                'units' => $units,
                'thicknesses' => $thicknesses,
                'product' => Product::findOrFail($id),                
            ];

            // dd($data);

            return view('frontend/mattress/detail/type1', $data);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product is not found
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }


    // AJAX endpoint to get product variants based on size and thickness
    public function get_product_variants(Request $request)
    {
        $sizeId = $request->input('size_id');
        // $thicknessId = $request->input('thickness_id');

        $variants = ProductVariant::where('size_id', $sizeId)
                                //   ->where('thickness_id', $thicknessId)
                                  ->get();

        // Transform the variants data
        $transformedVariants = $variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'product_name' => $variant->product->name,
                'size_name' => $variant->size->name,
                
                // product dimensions
                'product_dimensions' => [
                    'inches' => $variant->dimension_in_inches,
                    'feet' => $variant->dimension_in_feet,
                    'cm' => $variant->dimension_in_cm,
                ],
                'variantCode' => $variant->product_variant_code,
                'price' => $variant->price,
                'createdAt' => $variant->created_at->toDateTimeString(),
                'updatedAt' => $variant->updated_at->toDateTimeString(),
            ];
        });

        $response = [
            'success' => true,
            'variants' => $transformedVariants,
        ];


        return response()->json($response);
    }

}
