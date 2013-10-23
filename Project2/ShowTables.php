
<?php

$con= new mysqli('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 

$sql = <<<SQL
    SELECT *
    FROM `schedule`
SQL;

if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
}



while($row = $result->fetch_assoc()){
    echo $row['sc_name'] . '<br />';
}


echo 'Total results: ' . $result->num_rows;

?>
