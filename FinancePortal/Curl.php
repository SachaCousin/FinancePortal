<?php




$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://yfapi.net/v8/finance/chart/$nomste?range=10y&region=US&interval=1d&lang=en&events=div%2Csplit",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-api-key: tybGqv1ZDD9TxE9vWX9RP2YHIwIlhEDq7iMvPdj3"
	],
]);

$response = json_decode(curl_exec($curl),true);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

global $response;

require 'classDatafi.php';


$dateTable=[];
$closeTable=[];
$theTable=[];

$data = $response;

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
	if(date('d/m/y',$tstamp)!==date('d/m/y',time())){
    $odf = new DataFinance($tstamp,$topen,$tclose,$tlow,$thigh,$tvolume,$tadjclose,0,'N/A','N/A','N/A');}
    $theTable[]=$odf;
	global $theTable;
}


foreach($theTable as $datas){
	if(isset($directdivds)){
	foreach($directdivds as $elements){
	    
			if($elements["date"]==$datas->timestamp){
			$datas->ev_DividendsO = $elements['amount'];
			};
            };
		};
	if(isset($directsplit)){
    foreach($directsplit as $elements){
	    
                if($elements["date"]==$datas->timestamp){
                $datas->ev_SplitRatioO = $elements['splitRatio'];
                };
                };
			};

};

};




//var_dump($theTable);

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



