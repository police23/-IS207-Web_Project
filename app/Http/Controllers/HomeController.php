<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneVariants;

class HomeController extends Controller
{

    public function index()
    {
        $featuredProducts = PhoneVariants::where('featured', 1)
                  ->selectRaw('MIN(id) as id, phone_variants_name, phone_id, regular_price, MIN(image) as image') // Select the first image
                  ->groupBy('phone_variants_name', 'phone_id', 'regular_price') // Group by other fields
                  ->get();

        return view('index', compact('featuredProducts'));
    }
}
