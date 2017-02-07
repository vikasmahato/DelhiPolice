<?php
require 'database-config.php';
require 'server/logger.php';

$appName = $_POST['applicantName'];
$pis = $_POST['pis'];
$rank = $_POST['rank'];
$relation = $_POST['relation'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$hospitalName = $_POST['hospitalName'];
$policestationNo = $_POST['idNo'];
$diaryNo = $_POST['diaryNo'];
$appCGHSno = $_POST['appCGHSno'];
$appCGHSexp = $_POST['appCGHSexp'];
$refCGHSno = $_POST['refCGHSno'];
$refCGHSexp = $_POST['refCGHSexp'];
$appCGHScategory = $_POST['appCGHScategory'];
$diaryDate = $_POST['diaryDate'];

try {
    
$date1 = new DateTime($startDate);
$date2 = new DateTime($endDate);
$period = $date1->diff($date2);
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($relation=="")
{
    $relation="NULL";
    $refCGHSno="NULL";
    $refCGHSno="NULL";
    
}

$sql = "INSERT INTO form (applicant_name, pis, rank, relation, startdate, enddate, hospital_name, police_station_no, diary_no, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, diary_date, claim_type, status) 

VALUES ('$appName', '$pis', '$rank', '$relation', '$startDate', '$endDate', '$hospitalName', '$policestationNo', '$diaryNo', $appCGHSno, '$appCGHSexp',$refCGHSno, '$refCGHSexp', '$appCGHScategory', '$diaryDate', 'PERMISSION','HAG')";
    

    // use exec() because no results are returned
    $dbh->exec($sql);
    
$sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;





?>