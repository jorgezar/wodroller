<?php
namespace App\JorgezarDiceRoll\Rolls;

use App\JorgezarDiceRoll\Dice\Dice;

class Roll implements iRoll
{
    private $pool = [];
    
    /*
     * Exploding die is rerolled if highest score is generated
     * 
     */
    private $explode = true;
    
//     private $results = [];
    
    /**
     * execute roll
     *
     * @author Jerzy Zaremba-Śmietański
     */
    public function explodingRoll() {
        $results = $rerolls = $resultsWithRerolls = [];
        $rerollsCount = 0;

        foreach ($this->pool as $diceType => $diceNumber) {
            $dice = new Dice($diceType);
            for ($i = 0; $i < $diceNumber; $i++ ) {
                $result = $dice::roll();
                $results[] = $result;
                // case of exploding die
                if ($result == $diceType) {
                    $rerollsCount++;
                }
            }
            $rerolls = $this->explodingRerolls($rerollsCount, $dice);
        }

        $resultsWithRerolls = array_merge($results, $rerolls);
        return $resultsWithRerolls;
    }

    public function roll() {
        $results = [];
        foreach ($this->pool as $diceType => $diceNumber) {
            $dice = new Dice($diceType);
            for ($i = 0; $i < $diceNumber; $i++ ) {
                $results[] = $dice::roll();
            }
        }
        
        return $results;
    }
    
    /**
     * Add number of dices to dice pool
     *
     * @param integer $diceSides
     * @param integer $diceNumber
     * @author Jerzy Zaremba-Śmietański
     */
    public function addDiceToPool($diceSides, $diceNumber) {
        $this->pool[$diceSides] = $diceNumber;
    }
    
    /**
     * 
     * 
     * @param integer $rerollCount
     * @param Dice $dice
     * return array $results
     * @author Jerzy Zaremba-Śmietański
     */
    private function explodingRerolls(int $rerollCount, Dice $dice) {
        $results = [];
        $maxResult = $dice::$sides;
        // reroll ad infinitum every explosion
        // no botches on rerolls
        while ($rerollCount > 0 ) {
            $result = $dice::roll();
            // don't add 1's to reroll results
            if ($result > 1) {
                $results[] = $result;
                // reroll any highest scores
                if ( $result < $maxResult ) {
                    $rerollCount--;
                }
            } else {
                $rerollCount--;
            }  
        }

        return $results;
    }
    
    /*
     * Set exploding dice
     * 
     */
    public function setExplode(boolean $explode)
    {
        $this->explode = $explode;
        return $this;
    }
}