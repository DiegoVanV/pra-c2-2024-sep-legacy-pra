<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        // Haal het merk op op basis van ID
        $brand = Brand::findOrFail($brand_id);

        // Haal alle handleidingen op voor dit merk
        $manuals = Manual::where('brand_id', $brand_id)->get();

        $brand->increment('popularity');

        // Haal de 5 populairste handleidingen voor dit merk op
        $topManuals = Manual::where('brand_id', $brand_id)
                            ->orderBy('popularity', 'desc')  // Zorg dat er een 'popularity' kolom is
                            ->take(5)                        // Limiteer tot 5 handleidingen
                            ->get();

        // Stuur het merk, alle handleidingen en de populairste handleidingen naar de view
        return view('pages.manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "topManuals" => $topManuals  // Voeg de populairste handleidingen toe aan de view
        ]);
    }
}
