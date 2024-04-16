<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteoController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function getWeather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = '4186a74e9d390addb2ba4cf81ca1f6cb'; // Remplacez YOUR_API_KEY par votre clé API météo

        // Appel à l'API météo
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");

        if ($response->ok()) {
            $weatherData = $response->json();
            return view('weather', ['weatherData' => $weatherData]);
        } else {
            return back()->withErrors(['city' => 'Ville introuvable. Veuillez réessayer.']);
        }
    }
}



