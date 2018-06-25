<?php
namespace App\JorgezarWodProbability;

use App\Helpers\WodrollHelper;
use App\JorgezarDiceRoll\Rolls\Roll;

class WodrollProbability {
    
    private $diceNo =1;
    
    private $diceSides = 10;
    
    private $explode = true;
    
    private $botch = true;
    
    private $difficulty = 7;
    
    private $results = [];
    
    private $rollsNo = 1000;
    
//     private $rollsSuccesses = [];
    
    public function executeRolls()
    {
        $dicePool = new Roll();
        $dicePool->addDiceToPool($this->diceSides, $this->diceNo);
        
        // call different procedures for exploding and regular rolls
        if ( $this->explode == 'true' ) {
            for ($i = 0; $i < $this->rollsNo ; $i++) {
                $this->results[] = $dicePool->explodingRoll();
            }
        } else {
            for ($i = 0; $i < $this->rollsNo ; $i++) {
                $this->results[] = $dicePool->roll();
            }
        }

        $successMap = $this->getSuccesses();
        return $successMap;
        
    }
    
    public function getSuccesses()
    {
        $successMap = [];
        
        foreach ($this->results as $roll) {
            $offset = $this->countSuccesses($roll);

            if (!empty($successMap[$offset])) {
                $successMap[$offset] += 1;

            } else {
                $successMap[$offset] = 1;
            }
        }

        return $successMap;
    }
    
    public function countSuccesses($roll)
    {
        $successes = 0;
        foreach ($roll as $die) {
            if ( $this->botch == 'true' && $die == 1 ) {
                $successes -= 1;
            } else if ($die >= $this->difficulty) {
                $successes += 1;
            }
        }
        return $successes;
    }
    
    /**
     * @return number
     */
    public function getRollsNo()
    {
        return $this->rollsNo;
    }

    /**
     * @param number $rollsNo
     */
    public function setRollsNo($rollsNo)
    {
        $this->rollsNo = $rollsNo;
    }
    
    /**
     * @return number
     */
    public function getDiceNo()
    {
        return $this->diceNo;
    }

    /**
     * @return number
     */
    public function getDiceSides()
    {
        return $this->diceSides;
    }

    /**
     * @return boolean
     */
    public function getExplode()
    {
        return $this->explode;
    }

    /**
     * @return boolean
     */
    public function getBotch()
    {
        return $this->botch;
    }

    /**
     * @return number
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @return multitype:
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param number $diceNo
     */
    public function setDiceNo($diceNo)
    {
        $this->diceNo = $diceNo;
        return $this;
    }

    /**
     * @param number $diceSides
     */
    public function setDiceSides($diceSides)
    {
        $this->diceSides = $diceSides;
        return $this;
    }

    /**
     * @param boolean $explode
     */
    public function setExplode($explode)
    {
        $this->explode = $explode;
        return $this;
    }

    /**
     * @param boolean $botch
     */
    public function setBotch($botch)
    {
        $this->botch = $botch;
        return $this;
    }

    /**
     * @param number $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * @param multitype: $results
     */
    public function setResults($results)
    {
        $this->results = $results;
        return $this;
    }

}