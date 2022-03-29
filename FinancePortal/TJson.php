<?php
require 'classDatafi.php';

$string = file_get_contents("C:\Users\GreeN\Downloads/response_1646665822419.json");
$data = json_decode($string, true);

$theTable=[];


$directStamp =$data["chart"]["result"][0]["timestamp"];
$directClose =$data["chart"]["result"][0]["indicators"]["quote"][0]["close"];
$directVolume =$data["chart"]["result"][0]["indicators"]["quote"][0]["volume"];
$directLow =$data["chart"]["result"][0]["indicators"]["quote"][0]["low"];
$directOpen =$data["chart"]["result"][0]["indicators"]["quote"][0]["open"];
$directHigh =$data["chart"]["result"][0]["indicators"]["quote"][0]["high"];
$directadjclose =$data["chart"]["result"][0]["indicators"]["adjclose"][0]["adjclose"];
$directdivds =$data["chart"]["result"][0]["events"]["dividends"];
$directsplit =$data["chart"]["result"][0]["events"]["splits"];





for($i=0;$i<count($directStamp);$i++){
    $tstamp=$directStamp[$i];
    $tclose=$directClose[$i];
    $tvolume=$directVolume[$i];
    $tlow=$directLow[$i]; 
    $topen=$directOpen[$i];
    $thigh=$directHigh[$i];
	$tadjclose=$directadjclose[$i];

    $odf = new DataFinance($tstamp,$topen,$tclose,$tlow,$thigh,$tvolume,$tadjclose,0,'','','');
    $theTable[]=$odf;
	global $theTable;
}


foreach($theTable as $datas){
	foreach($directdivds as $elements){
	    
			if($elements["date"]==$datas->timestamp){
			$datas->ev_DividendsO = $elements['amount'];
			};
            };
    
    foreach($directsplit as $elements){
	    
                if($elements["date"]==$datas->timestamp){
                $datas->ev_SplitRatioO = $elements['splitRatio'];
                var_dump($elements['splitRatio']);
                var_dump(gettype($datas->ev_SplitRatioO));
                };
                };

};



//$this->adjcloseO =  $adjcloseO; 
//$this->ev_DividendsO =  $ev_DividendsO; 
//$this->ev_SplitRatioO = $ev_SplitRatioO; 
//$this->othersEvO =  $othersEvO;
//$this->adescriptionO =  $adescriptionO; 


//foreach($data["chart"]["result"][0]["indicators"]["quote"][0]["close"] as $close){
    //$closeTable[]=$close;
    
//};
//public function __construct( int $timestamp, float $openO, float $closeO, float $lowO,
 //    float $highO, float $volumeO, float $adjcloseO, float $ev_DividendsO, string $ev_SplitRatioO,
  //   string $othersEvO, string $adescriptionO){
