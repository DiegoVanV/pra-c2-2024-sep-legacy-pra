<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Controleer of de "lang" parameter is ingesteld en valideer deze
        if ($request->has('lang') && in_array($request->get('lang'), ['en', 'nl'])) {
            // Zet de taal van de applicatie
            App::setLocale($request->get('lang'));
            session(['locale' => $request->get('lang')]);
        } elseif (session()->has('locale')) {
            // Haal de taal uit de sessie als deze bestaat
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}
