<?php    
    require 'dbh.ext.php';
    require '../../FinancePortal/Curl.php';
    

   
    foreach ($theTable as $odfObject){
    
    $sql2="INSERT INTO $nomste (timestamp,open,close,low,high,volume,adjclose,ev_Dividends,ev_SplitRatio) VALUES ($odfObject->timestamp,$odfObject->openO,$odfObject->closeO,$odfObject->lowO,$odfObject->highO,$odfObject->volumeO,$odfObject->adjcloseO,$odfObject->ev_DividendsO,'$odfObject->ev_SplitRatioO')";
        $res2=mysqli_query($con,$sql2);

        
    };

mysqli_close($con);


//ev_Dividends,ev_SplitRatio
//$odfObject->ev_DividendsO,$odfObject->ev_SplitRatioO