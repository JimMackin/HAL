<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use App\Utility\WeatherAPI;

class WeatherController extends AppController
{


    public function index()
    {
        $weatherAPI = new WeatherAPI();
        $this->set([
            'weather' => $weatherAPI->getWeather(),
        ]);
    }
}


