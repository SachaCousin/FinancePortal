<?php
require '../FinancePortal/externe/dbh.ext.php';
$search=$_POST["mot"];
$sql3="SELECT DISTINCT * FROM mappingstk WHERE nom LIKE '%$search%'";
$res3=mysqli_query($con,$sql3);
$tab=$res3->fetch_all();

mysqli_close($con);

foreach($tab as $elements){
    echo '<div>'.$elements[1].' - Ticker: '.$elements[2].'</div>';
}
