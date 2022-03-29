<?php


$queryString = http_build_query([
    'access_key' => "90ad0a7c4cf987eda1d0a02a80e3fb5b"]);
  
  $ch = curl_init(sprintf('%s?%s', 'https://api.marketstack.com/v1/tickers/aapl/eod', $queryString));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  $json = curl_exec($ch);
  curl_close($ch);
  
  $apiResult = json_decode($json, true);
  
  foreach ($apiResult as $stocksData){
    echo sprintf('Ticker %s has a day high of %s on %s', $stockData['AAPL'], $stockData['high'], $stockData['date'] );
  }