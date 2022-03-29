<?php

function string2url($chaine) { 
    $chaine = trim($chaine); 
    $chaine = strtr($chaine, 
   "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", 
   "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"); 
    $chaine = strtr($chaine,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz"); 
    $chaine = preg_replace('#([^A-Za-z]+)#i', '', $chaine); 
           $chaine = preg_replace('#-{2,}#','',$chaine); 
           $chaine = preg_replace('#-$#','',$chaine); 
           $chaine = preg_replace('#^-#','',$chaine); 
    return $chaine; 
   }

function Testsql($timestamp2,$table){
    require 'dbh.ext.php';
    
    $sql8="SELECT DISTINCT timestamp FROM $table WHERE timestamp LIKE '$timestamp2'";
    $res8=mysqli_query($con,$sql8);
    $tab=$res8->fetch_all();
    if(isset($tab[0][0])){
    return true;
    }else{
    return false;
}
};

function showTables(){
    require 'dbh.ext.php';
    
    $sql9="SHOW TABLES";
    $res9=mysqli_query($con,$sql9);
    $tab=$res9->fetch_all();
    $tab2=[];
    //renvoi le nb de datas
    foreach($tab as $elements){
        $theStock=$elements[0];
        
       $sqlx="SELECT COUNT(*) FROM $theStock";
        $resx=mysqli_query($con,$sqlx);
       $countT=$resx->fetch_all();


      //renvoi si stck la date converti du timestamp de la table stck
        if(preg_match("/stck/",$theStock)==true){
                $sqlT="SELECT timestamp FROM $theStock WHERE id=(SELECT max(id) FROM $theStock)";
                $resT=mysqli_query($con,$sqlT);
                $countTx=$resT->fetch_all();
             if(!$countTx[0][0]==false) {
                
                $countT2=date('d/m/y',$countTx[0][0]);}

        
        
        }else{
                 $countT2="N/A";
             }
        

       
       
       $tab2[]='<div style="color:white;font-weight:bold;font-size:13px;">'.$theStock.' Nb Datas : '.$countT[0][0].'</div><div style="color:#161c6f;font-weight:bold"> Last Data : '.$countT2.'</div>';
    };

    
    return $tab2;
};


function dataToChart($Stock){
    require 'dbh.ext.php';
    $tbName=$Stock;
    $sql20="SELECT timestamp,close FROM $tbName";
    $resul=mysqli_query($con,$sql20);
    $tabx=$resul->fetch_all();
    $tabxF1=[];
    $tabxF2=[];
    $tabxF=[];
    foreach ($tabx as $elements){
        $tabxF1[]=$elements[0];
        $tabxF2[]=$elements[1];
       
    }
    $tabxF=[$tabxF1,$tabxF2];
    return $tabxF;
}



