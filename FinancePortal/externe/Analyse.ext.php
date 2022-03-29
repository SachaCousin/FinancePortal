<?php

$test="salut";
global $test;



if(isset($_POST['data-submit'])){
    require 'dbh.ext.php';
    require 'tnt.php';
    $nomste=$_POST["nomste"];
    
   
    global $nomste;

    // ressort la column index of selected stck in mapping
    $sql4="SELECT DISTINCT * FROM mappingstk WHERE ticker LIKE '$nomste'";
    $res4=mysqli_query($con,$sql4);
    $tab=$res4->fetch_all();
    if(!empty($tab)){
    global $tab;   
    $theName= 'stck_'.$tab[0][3].'_'.string2url($tab[0][1]);}
    else{
        if(isset($_POST['inputbox2'])){
            $labelSte=$_POST['inputbox2'];
            $sql5="INSERT INTO mappingstk(isin,nom,ticker) VALUES ('n/A','$labelSte','$nomste')";
            $res5=mysqli_query($con,$sql5);
            $theName='stck_'.$tab[0][3].'_'.string2url($labelSte);
            header("Location:../Analyse.php?error=presque!!!");
        }else{
            header("Location:../Analyse.php?error=Ticker inexistant!!!");
        }
        
        
        
        
    }
   


   
   
     
    // Créer un table si pas deja existante

    $sql="CREATE TABLE IF NOT EXISTS $theName (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        timestamp INT(15),
        open FLOAT(15),
        close FLOAT(15),
        low FLOAT(15),
        high FLOAT(15),
        volume INT(15),
        adjclose FLOAT(15),
        ev_Dividends FLOAT(15),
        ev_SplitRatio VARCHAR(100),
        othersEv FLOAT(15),
        adescription VARCHAR(300)
    )";

    $res=mysqli_query($con,$sql);
    
    require '../../FinancePortal/Curl.php';
    
    
    
// envoi les resultat
   
    foreach ($theTable as $odfObject){
    if(Testsql($odfObject->timestamp,$theName)==false){
       

        
        $sql2="INSERT INTO $theName (timestamp,open,close,low,high,volume,adjclose,ev_Dividends,ev_SplitRatio) VALUES ($odfObject->timestamp,$odfObject->openO,$odfObject->closeO,$odfObject->lowO,$odfObject->highO,$odfObject->volumeO,$odfObject->adjcloseO,$odfObject->ev_DividendsO,'$odfObject->ev_SplitRatioO')";
        $res2=mysqli_query($con,$sql2);
        };
        
    };

    if(!$res){
        header("Location:../Analyse.php?error=sqlerror");
        exit();
    }else{
        header("Location:../Analyse.php?Datatablecreated!!!");
        exit();
    };
    
   

     mysqli_close($con);
}elseif(isset($_POST['data-submit2'])){
    header("Location:../Analyse.php?graphreadytoreaction");

}else{
    

   header("Location:../Analyse.php?error=conFailed");
  exit();
};


