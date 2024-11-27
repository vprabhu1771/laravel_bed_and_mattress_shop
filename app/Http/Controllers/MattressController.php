<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

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
            
            $data = [
                'product' => Product::findOrFail($id),                
            ];

            // dd($data);

            return view('frontend/mattress/detail/type1', $data);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product is not found
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }

}
