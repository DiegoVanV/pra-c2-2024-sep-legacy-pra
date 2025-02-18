<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        // Haal het merk en de handleiding op
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);


        $manual->increment('popularity');

        return view('pages.manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }
}
