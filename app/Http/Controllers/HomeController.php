<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Thickness;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sizes = Size::all();
        $units = Unit::all();
        $thicknesses = Thickness::all();

        $data = [
            'sizes' => $sizes,
            'units' => $units,
            'thicknesses' => $thicknesses
        ];

        
        // return view('frontend/mattress/type1/index', $data);
        return view('frontend/mattress/type2/index', $data);
    }
}
