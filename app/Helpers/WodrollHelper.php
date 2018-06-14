<?php
namespace App\Helpers;

use App\JorgezarWodProbability\WodrollProbability;

class WodrollHelper 
{
    public static function getSuccesses(WodrollProbability $roll)
    {
        $successes = 0;
        foreach ($roll->getResults() as $die) {
            // each botch on basic roll deducts one success
            if ($botch && $die == 1) {
                $successes--;
                continue;
            }
//             if ()
        }
        $diff = 'diff is ' . $roll->getDifficulty();
        
        return $diff;
    }
}