<?php
namespace App\Utility;

use Cake\Cache\Cache;

class WeatherAPI
{

    private function getAPIURL(){
        $cityId = '2636909';
        $apiKey = "";
        $apiURL = "http://api.openweathermap.org/data/2.5/forecast?id=$cityId&appid=$apiKey&units=metric";
        return $apiURL;
    }

    public function getWeather(){
        $weather = Cache::read('weather','weather');
        if($weather !== false){
            return $weather;
        }
        $results = file_get_contents($this->getAPIURL());

        $weather = json_decode($results);
        Cache::write('weather',$weather,'weather');
        return $weather;
    }
}


