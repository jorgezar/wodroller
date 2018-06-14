<?php
namespace App\JorgezarDiceRoll\Rolls;

interface iRoll
{      
    /**
     * execute roll
     * 
     * @author Jerzy Zaremba-Śmietański
     */
    public function roll();
    
    /**
     * Add number of dices to dice pool
     * 
     * @param integer $diceType
     * @param integer $diceNumber
     * @author Jerzy Zaremba-Śmietański
     */
    public function addDiceToPool($diceType, $diceNumber);
    
}