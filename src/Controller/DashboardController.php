<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\BinDay;
use App\Utility\WeatherAPI;
class DashboardController extends AppController
{
    public function index()
    {
        $binDay = BinDay::getNextBinDay();
        $weatherAPI = new WeatherAPI();
        $weather = $weatherAPI->getWeather();
        $this->set([
            'binDay' => $binDay,
            'weather' => $weather,
        ]);

    }
}

