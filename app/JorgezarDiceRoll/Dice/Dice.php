<?php
namespace App\JorgezarDiceRoll\Dice;

// use App\JorgezarDiceRoll\Dice\

class Dice extends DiceAbstract{
    
    public static $sides = 1;
    
    
    public function __construct($sides)
    {
        self::$sides = $sides;        
    }
    
    /**
     * Static function returns result of single roll
     */
    public static function roll()
    {
        return rand(1, self::$sides);
    }

}