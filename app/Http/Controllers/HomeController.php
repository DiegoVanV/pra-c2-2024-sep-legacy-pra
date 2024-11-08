<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;  // Import Brand model
use App\Models\Manual; // Import Manual model
use App\Models\Category; // Import Category model

class HomeController extends Controller
{
    public function showhome()
    {
        // Haal de top 10 populairste merken op
        $topBrands = Brand::orderBy('popularity', 'desc')->take(10)->get();

        // Stuur de gegevens naar de view
        return view('pages.homepage', [
            'name' => 'Victoria',
            'occupation' => 'Astronaut',
            'topBrands' => $topBrands
        ]);
    }
    public function show($brand_id, $brand_slug)
    {
        // Haal het merk op en controleer dat zowel het ID als de slug kloppen
        $brand = Brand::where('id', $brand_id)
                      ->where('slug', $brand_slug)
                      ->firstOrFail();

        // Verhoog de populariteit van het merk met 1
        $brand->increment('popularity');

        // Haal handleidingen op die aan dit merk zijn gekoppeld
        $manuals = Manual::where('brand_id', $brand_id)->get();

        // Haal de 5 populairste handleidingen voor dit merk op
        $topManuals = Manual::where('brand_id', $brand_id)
                            ->orderBy('popularity', 'desc') // Zorg ervoor dat je een 'popularity' kolom hebt in de 'manuals' tabel
                            ->take(5)
                            ->get();

        return view('pages.manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "topManuals" => $topManuals // Voeg de populairste handleidingen toe aan de view
        ]);
    }


    public function showCategories()
    {
        $categories = Category::all();
        return view('pages.product_category_brands', compact('categories'));
    }

    public function showCategoryBrands($category_id)
    {
        $category = Category::findOrFail($category_id);
        $brands = Brand::where('category_id', $category_id)->with('models')->get();

        return view('pages.manual_list', compact('category', 'brands'));
    }

    public function showOverzicht()
    {
        $brands = Brand::all(); // Haal alle relevante merken op

        return view('pages.overzicht', [
            'brands' => $brands,
        ]);
    }

    public function getModelsForBrand($brand_id)
    {
        $brand = Brand::with('models')->findOrFail($brand_id); // Zorg ervoor dat je het model hebt geladen met de modellen
        return response()->json(['models' => $brand->models]);
    }
}
