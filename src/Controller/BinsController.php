<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;

use \DateTimeImmutable;
use \DateInterval;
use App\Model\Entity\BinDay;

class BinsController extends AppController
{


    public function index()
    {
        $this->set([
            'binDay' => BinDay::getNextBinDay(),
        ]);
    }
}


