<?php
require 'database-config.php';
require 'server/logger.php';

$appName = $_POST['applicantName'];
$pis = $_POST['pis'];
$rank = $_POST['rank'];
$relation = $_POST['relation'];
$pincode = $_POST['pincode'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$hospitalName = $_POST['hospitalName'];
$hospitalAddress = $_POST['hospitalAddress'];
$policestationNo = $_POST['idNo'];
$diaryNo = $_POST['diaryNo'];
$refHospitalname = $_POST['refHospitalname'];
$appCGHSno = $_POST['appCGHSno'];
$appCGHSexp = $_POST['appCGHSexp'];
$refCGHSno = $_POST['refCGHSno'];
$refCGHSexp = $_POST['refCGHSexp'];
$appCGHScategory = $_POST['appCGHScategory'];
$disease = $_POST['disease'];
$diaryDate = $_POST['diaryDate'];
$amtAsked = $_POST['amtAsked'];
$hospType = $_POST['hospType'];


try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$date1 = new DateTime($startDate);
$date2 = new DateTime($endDate);
$period = $date1->diff($date2);
    

$sql = "INSERT INTO form (applicant_name, pis, rank, relation, pincode, startdate, enddate, hospital_name, hospital_address, police_station_no, diary_no, ref_hospital_name, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, disease, diary_date, amt_asked, period, claim_type, hospType ) 

VALUES ('$appName', '$pis', '$rank', '$relation', $pincode, '$startDate', '$endDate', '$hospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo','$refHospitalname',$appCGHSno,'$appCGHSexp',$refCGHSno,'$refCGHSexp','$appCGHScategory','$disease', '$diaryDate',$amtAsked, '$period->days','OP_REFERRAL', '$hospType' )";
 

// use exec() because no results are returned
    $dbh->exec($sql);
       
 // use exec() because no results are returned
    
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

//yyyyyynyyy


 header ("Location: checklist.php");

?>
