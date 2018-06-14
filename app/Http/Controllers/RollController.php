<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\JorgezarDiceRoll\Rolls\Roll;
use App\JorgezarWodProbability\WodrollProbability;
use App\Helpers\WodrollHelper;


class RollController extends Controller
{
    public function index(Request $request)
    {
        return view('DiceRoller.main');

    }
    
    public function roll(Request $request)
    {
        $dice=$difficulty=$explode=$fail=0;
        // for now we are doing 100 wod d10 rolls
        $sides = 10;
        $rollsNo = 1000;
        // prepare response for ajax request
        if($request->ajax()) {
            // get data from roll form
            $dice = $request->input('diceNumber');
            $difficulty = $request->input('difficulty');
            $explode = $request->input('explode');
            $fail = $request->input('fail');

            // prepare probability calculations
            $wodroll = new WodrollProbability();
            $wodroll
                ->setBotch($fail)
                ->setExplode($explode)
                ->setDiceNo($dice)
                ->setDifficulty($difficulty)
                ->setDiceSides($sides)
                ->setRollsNo($rollsNo)
                ;

            $successMap = $wodroll->executeRolls(); 
            
            $results = WodrollHelper::decorateResults();
            
            $view = view('DiceRoller.results', ['results' => $results]);
            
            $response = new Response($view);
            
            return $response;
        }
//         $pool = new Roll();
        
//         // for now we do only d10 rolls
//         // change this parameter to set number of sides
//         $type = 10;
        
//         $pool->addDiceToPool($type, $diceNumber);
        
//         $results = $pool->roll();
//         //         return $results;
//         return view('DiceRoller.main')
//         ->with(
//             'results', $results
//             );
    }
}
