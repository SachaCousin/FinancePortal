<?php

class DataFinance {
    

    public int $timestamp;  
    public float $openO; 
    public float $closeO; 
    public float $lowO; 
    public float $highO; 
    public float $volumeO; 
    public float $adjcloseO; 
    public float $ev_DividendsO; 
    public string $ev_SplitRatioO; 
    public string $othersEvO;
    public string $adescriptionO; 


    public function __construct( int $timestamp, float $openO, float $closeO, float $lowO,
     float $highO, float $volumeO, float $adjcloseO, float $ev_DividendsO, $ev_SplitRatioO,
     string $othersEvO, string $adescriptionO){
        $this->timestamp = $timestamp;
        $this->openO = $openO; 
        $this->closeO = $closeO; 
        $this->lowO = $lowO; 
        $this->highO =  $highO; 
        $this->volumeO = $volumeO; 
        $this->adjcloseO =  $adjcloseO; 
        $this->ev_DividendsO =  $ev_DividendsO; 
        $this->ev_SplitRatioO = $ev_SplitRatioO; 
        $this->othersEvO =  $othersEvO;
        $this->adescriptionO =  $adescriptionO; 






    }
};