<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MattressController extends Controller
{
    // Mattress List
    public function index(Request $request)
    {
        return view('frontend/mattress/list/type1');
    }

}
