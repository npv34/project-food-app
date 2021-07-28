<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    function showCurrentWeather(Request $request)
    {
        $nameCity = ($request->cityName) ? $request->cityName : 'hanoi';
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                "q" => $nameCity,
                "appid" => "02e3323f29bc461c2346db2fe3989729"
            ]
        );

        $data = json_decode($response->body());
        $temperature = $data->main->temp - 273;
        $weather = $data->weather[0]->main;
        return view('admin.weathers.current-wether', compact('temperature', 'weather'));
    }
}
