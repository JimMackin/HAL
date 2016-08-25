<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use \DateTimeImmutable;
use \DateInterval;
class BinDay extends Entity {
    public $useTable = false;
    
    private $date;
    private $grey = false;
    private $blue = false;
    private $brown = false;
    private $card = false;
    
    public function isGrey(){
        return $this->grey;
    }

    public function isBlue(){
        return $this->blue;
    }

    public function isBrown(){
        return $this->brown;
    }

    public function isCard(){
        return $this->card;
    }

    public static function getNextBinDay(){
        $now = new DateTimeImmutable();
        $currentDay = new BinDay();
        $currentDay->date = new DateTimeImmutable('2016-08-18 23:59:59');
        $currentDay->grey = true;
        $currentDay->blue = true;
        $currentDay->brown = false;
        $currentDay->card = true;

        while($currentDay->date < $now){
            $currentDay->date = $currentDay->date->add(new DateInterval('P7D'));
            $currentDay->grey = !$currentDay->grey;
            $currentDay->brown = !$currentDay->brown;
            $dayDiff = $currentDay->date->diff($now)->d;
            $label = '';
            switch($dayDiff){
                case 0:
                    $label = "Today";
                    break;
                case 1:
                    $label = "Tomorrow";
                    break;
                default:
                    $label = "In $dayDiff days";
            }
            $currentDay['label'] = $label;
        }
        return $currentDay;
    }

    public function getLabel(){
        $now = new DateTimeImmutable();
        $dayDiff = $this->date->diff($now)->d;
        $label = '';
        switch($dayDiff){
            case 0:
                $label = "Today";
                break;
            case 1:
                $label = "Tomorrow";
                break;
            default:
                $label = "In $dayDiff days";
        }
        return $label;
    }
}
