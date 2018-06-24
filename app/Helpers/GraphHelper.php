<?php
namespace App\Helpers;

use App\JorgezarWodProbability\WodrollProbability;

class GraphHelper 
{
    private $successMap = [];
    
    public function __construct($successMap)
    {
        // sort by number of successes asc
        ksort($successMap);
        $this->successMap = $successMap;
        
    }
    
    /**
     * prepares data for graph.js line graph
     * @param array $successMap
     * @return array $data
     * @author Jerzy Zaremba-Śmietański
     */
    public function getLineChartData(int $rollsNo)
    {
        $data = $labels = $counts = [];

        $counter = count($this->successMap);

        foreach ($this->successMap as $l => $c) {
            $labels[] = $l;
            $probability = intval($c) / $rollsNo;
            $counts[] = $probability;
        }
        
        $data = ['labels' => $labels, 'counts' => $counts];

        return $data;
    }
}