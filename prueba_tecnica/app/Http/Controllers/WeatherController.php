<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    private $api_key;

    public function __construct()
    {
        $this->api_key = env('API_WEATHER_KEY');
    }

    public function getWeather(Request $request)
    {
        $user_cp = $request->cp_user;
        // Recuperamos las coordenadas del cp facilitado por el usuario.
        $lat_lon = $this->getPositionByCP($user_cp);

        // Realizamos petición a la URL de la api con las coordenadas recuperadas previamente
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat='.$lat_lon['lat'].'&lon='.$lat_lon['lon'].'&appid='.$this->api_key)->json();

        return $response;
    }


    protected function getPositionByCP($cp){
        //Recuperamos Latitud y Longitud del CP pasado por el input de la view
        $response = Http::get('http://api.openweathermap.org/geo/1.0/zip?zip='.$cp.',ES&appid='.$this->api_key)->json();
        return ['lat' => $response['lat'], 'lon' => $response['lon']];
    }
}
