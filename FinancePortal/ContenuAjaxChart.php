
    <?php
    
   
    require '../FinancePortal/externe/dbh.ext.php';
    require '../FinancePortal/externe/tnt.php';
    $nomste=$_POST["mot"];
    // probleme de reception de donnée : )   $nomste=$_POST["nomste"];
    $sqlp="SELECT DISTINCT * FROM mappingstk WHERE ticker LIKE '$nomste'";
    $res4=mysqli_query($con,$sqlp);
    $tab=$res4->fetch_all();
    $theName= 'stck_'.$tab[0][3].'_'.string2url($tab[0][1]);
    $toChart=dataToChart($theName);

    mysqli_close($con);
      
    echo json_encode($toChart);

          
    