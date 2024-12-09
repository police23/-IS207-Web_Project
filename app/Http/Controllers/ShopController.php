<?php

namespace App\Http\Controllers;

use App\Models\PhoneVariants; // Import model PhoneVariants
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Phone;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();
        $query = PhoneVariants::with('phone.brand')
                  ->selectRaw('MIN(id) as id, phone_variants_name, phone_id, regular_price, GROUP_CONCAT(DISTINCT image) as images, GROUP_CONCAT(DISTINCT color) as colors') // Add colors to select
                  ->groupBy('phone_variants_name', 'phone_id', 'regular_price'); // Group by other fields

        if ($request->has('brand') && !empty($request->brand)) {
            $query->whereHas('phone', function ($q) use ($request) {
                $q->whereIn('brand_id', $request->brand);
            });
        }

        if ($request->has('storage') && !empty($request->storage)) {
            $query->whereIn('storage_id', $request->storage);
        }

        if ($request->has('battery') && !empty($request->battery)) {
            $query->whereHas('phone', function ($q) use ($request) {
                $batteryRanges = [
                    1 => [0, 3000],
                    2 => [3000, 4000],
                    3 => [4000, 5000],
                    4 => [5000, PHP_INT_MAX]
                ];
                $q->where(function ($query) use ($request, $batteryRanges) {
                    foreach ($request->battery as $battery) {
                        if (isset($batteryRanges[$battery])) {
                            $query->orWhereBetween('battery', $batteryRanges[$battery]);
                        }
                    }
                });
            });
        }

        if ($request->has('operating_system') && !empty($request->operating_system)) {
            $query->whereHas('phone', function ($q) use ($request) {
                $q->whereIn('operating_system', $request->operating_system);
            });
        }

        if ($request->has('ram') && !empty($request->ram)) {
            $query->whereHas('phone', function ($q) use ($request) {
                $q->whereIn('ram', $request->ram);
            });
        }

        if ($request->has('price_range')) {
            $priceRange = explode(',', $request->input('price_range'));
            $minPrice = $priceRange[0];
            $maxPrice = $priceRange[1];
            $query->whereBetween('regular_price', [$minPrice, $maxPrice]);
        }

        if ($request->has('search-keyword') && !empty($request->input('search-keyword'))) {
            $keyword = $request->input('search-keyword');
           
            $query->where('phone_variants_name', 'like', '%' . $keyword . '%');
        }

        if ($request->has('sort')) {
            $sortOption = $request->input('sort');
            switch ($sortOption) {
                case 'az':
                    $query->orderBy('phone_variants_name', 'asc');
                    break;
                case 'za':
                    $query->orderBy('phone_variants_name', 'desc');
                    break;
                case 'price_high_low':
                    $query->orderBy('regular_price', 'desc');
                    break;
                case 'price_low_high':
                    $query->orderBy('regular_price', 'asc');
                    break;
            }
        }

        $phoneVariants = $query->get()->map(function ($item) {
            $item->image = explode(',', $item->images)[0];
            return $item;
        });
        if ($request->ajax()) {
            return response()->json($phoneVariants);
        }
    
        return view('shop', compact('brands', 'phoneVariants'));
    }

    public function show($id)
    {
        $phoneVariant = PhoneVariants::with('phone.brand', 'storage')->find($id);
        
        $phone = $phoneVariant->phone;
        $phoneVariants = PhoneVariants::where('phone_id', $phone->id)->get();
        $colors = $phoneVariants->pluck('color')->unique()->implode(',');
        $storages = PhoneVariants::where('phone_id', $phone->id)->with('storage')->get()->pluck('storage.storage_size')->unique();
        
        return view('details', compact('phone', 'phoneVariants', 'phoneVariant', 'colors', 'storages'));
    }
}

