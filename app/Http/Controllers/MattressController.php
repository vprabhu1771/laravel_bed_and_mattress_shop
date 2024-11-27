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

}
