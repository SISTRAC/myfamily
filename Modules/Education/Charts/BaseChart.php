<?php

namespace Modules\Education\Charts;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class BaseChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public $color;

    public $user;

    public $label;
    
    public function __construct()
    {
        parent::__construct();
        $this->color = $this->getColor();  
        $this->label = $this->getLabel();  
    }
    public function getColor()
    {
    	return '#6da252';
    }
    public function getLabel()
    {
    	return schoolAdmin()->school->yearsOfAdmission();
    }

    public function admissionDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
            $count = 0;
            foreach (schoolAdmin()->school->admitteds as $admission) {
                if($admission->year == $label){
                    $count ++;
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets;
    }

    public function graduationDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
            $count = 0;
            foreach (schoolAdmin()->school->admitteds as $admission) {
                if($admission->year == $label && $admission->graduated){
                    $count ++;
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets; 
    }

    public function reportDataset()
    {
        $data_sets = [];
        foreach($this->getLabel() as $label){
            $count = 0;
            foreach (schoolAdmin()->school->admitteds as $admission) {
                if($admission->year == $label){
                    foreach ($admission->schoolReports as $report) {
                        $count ++;
                    }
                }
            }
            $data_sets[] = $count;
        }
        return $data_sets;
    }
    
}
