<?php
require '../FinancePortal/externe/dbh.ext.php';
require '../FinancePortal/externe/tnt.php';

$tab2=showTables();

mysqli_close($con);

foreach($tab2 as $elements){
    echo '<div class="onfire">'.$elements.'</div>';
    
}
