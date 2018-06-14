<?php
namespace App\JorgezarDiceRoll\Dice;

abstract class DiceAbstract {
    
    protected static $sides;
    
    public function __construct(int $sides)
    {
        $this->sides = $sides;
    }
          
    /**
     * Static function returns result of single roll 
     */
    public static function roll()
    {}

}