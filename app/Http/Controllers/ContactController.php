<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = $request->all();

        $content = "Naam: " . $data['name'] . "\n";
        $content .= "Email: " . $data['email'] . "\n";
        $content .= "Bericht: " . $data['message'] . "\n";

        $filename = 'contact_' . time() . '.txt';
        File::put(storage_path("app/{$filename}"), $content);

        return redirect('/')->with('status', 'Je contactformulier is verstuurd!');
    }
}
