<?php
require 'database-config.php';

$subtotal = $_POST['subTotal'];

$itemNo = $_POST['itemNo'];
$itemName = $_POST['itemName'];
$total = $_POST['total'];

$arrlength = count($itemNo);





try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $row = $q->fetch();
    $appid = $row['app_id'];
    
    if($subtotal > 200000)
    
        $sql = "UPDATE form SET amt_granted = '$subtotal', status = 'PHQ' WHERE app_id = '$appid' ";
    else
        $sql = "UPDATE form SET amt_granted = '$subtotal', status = 'HAG' WHERE app_id = '$appid' ";
    
    $dbh->exec($sql);
    
    for($x = 0; $x < $arrlength; $x++) {
        
         $sql3 = "INSERT INTO medical (app_id, s_no, treatment, total) VALUES ('$appid','$itemNo[$x]', '$itemName[$x]', '$total[$x]')";
        
         $dbh->exec($sql3);
    }
   
    
    
    echo "New record created successfully " ;
    
    header ("Location: dealinghome2.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
