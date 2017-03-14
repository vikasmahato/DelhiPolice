<?php
require 'database-config.php';

$subtotal = round($_POST['subTotal']);

$itemNo = $_POST['itemNo'];
$itemName = $_POST['itemName'];
$totalGranted = $_POST['total'];
$itemHosp = $_POST['itemHosp'];
$itemDate = $_POST['itemDate'];
$totalAsked = $_POST['total_asked'] ;
$sumTotalAsked = round($_POST['askedTotal']);
$arrlength = count($itemNo);





try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $row = $q->fetch();
    $appid = $row['app_id'];
    
    if($subtotal > 200000)
    
        $sql = "UPDATE form SET amt_granted = '$subtotal',amt_asked = '$sumTotalAsked',  status = 'PHQ' WHERE app_id = '$appid' ";
    else
        $sql = "UPDATE form SET amt_granted = '$subtotal',amt_asked = '$sumTotalAsked',  status = 'HAG' WHERE app_id = '$appid' ";
    
    $dbh->exec($sql);
    
    for($x = 0; $x < $arrlength; $x++) {
         
         if($itemNo[$x]=='')
         {
             $itemNo[$x]=0;
         }
        if($itemHosp[$x]=='')
         {
             $itemHosp[$x]=' ';
         }
         $sql3 = "INSERT INTO medical (app_id, s_no, treatment, total, bill_no_hosp, date, amt_asked) VALUES ('$appid','$itemNo[$x]', '$itemName[$x]', '$totalGranted[$x]', '$itemHosp[$x]', '$itemDate[$x]','$totalAsked[$x]')";
        
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

