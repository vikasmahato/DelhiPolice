<?php
require 'database-config.php';
require 'server/log_to_sql.php';

$appName = $_POST['applicantName'];
$pis = $_POST['pis'];
$rank = $_POST['rank'];
$relation = $_POST['relation'];
$pincode = 000000;
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
$claim = $_POST['ctype'];
$claim_type = "";
/*$applicationDate = $_POST['applicationDate'];*/
$amtGranted = 0;
$amtDue = 0;

try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$date1 = new DateTime($startDate);
$date2 = new DateTime($endDate);
$period = $date1->diff($date2);
    
if($disease == "")
{
    $disease = "NULL";
    $refHospitalname= "NULL";
    $pincode = 0;
    $hospitalAddress = "NULL";
    $amtAsked = 0;
    
}
    elseif($refHospitalname == "")
{
     $refHospitalname= "NULL";   
}
  
    switch($claim){
            
        case "opref" : $claim_type = "OP_REFERRAL";// ref_log();
		       break;
	case "opemg" : $claim_type = "OP_EMERGENCY";
		       break;
	case "ipref" : $claim_type = "IP_REFERRAL";
		       break;
       case "emgctd" : $claim_type = "IP_EMERGENCY";
		       break;
       case "credit" : $claim_type = "CREDIT";
                       break;
       case "permit" : $claim_type = "PERMISSION";
		       break;
       case "advance": $claim_type = "ADV_CLAIM";
                       $amtGranted = 0.9 * $amtAsked;
		               break;
        case "adjust": $amtGranted = $_POST['amt_granted'];
                        $amtDue = $amtAsked - $amtGranted;
                        break;
	     default : $claim_type = "Invalid Claim!";
    }
    

$sql = "INSERT INTO form (application_date, applicant_name, pis, rank, relation, pincode, startdate, enddate, hospital_name, hospital_address, police_station_no, diary_no, ref_hospital_name, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, disease, diary_date, amt_asked, period, claim_type, amt_granted, amt_due ) 

VALUES (CURDATE(), '$appName', '$pis', '$rank', '$relation', $pincode, '$startDate', '$endDate', '$hospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo','$refHospitalname',$appCGHSno,'$appCGHSexp',$refCGHSno,'$refCGHSexp','$appCGHScategory','$disease', '$diaryDate',$amtAsked, '$period->days','$claim_type',$amtGranted,$amtDue )";
    
    $dbh->exec($sql);
    
     $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $row = $q->fetch();
    $appid = $row['app_id'];
     $sql1 = "";
    if($claim=="credit"){
        $sql1 = "UPDATE form SET status = 'HAG' WHERE app_id = '$appid' ";
      $dbh->exec($sql1);
       // echo "sucess";
    }
    elseif($claim=="permit"){
        $sql1 = "UPDATE form SET status = 'HAG' WHERE app_id = '$appid' ";
     $dbh->exec($sql1);
    }

    
    echo "New record created successfully ";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

//yyyyyynyyy

/*if($claim=="opref"||$claim=="opemg"||$claim=="ipref"||$claim=="emgctd")
 header ("Location: checklist.php");*/

?>
