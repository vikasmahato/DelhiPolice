<?php
require 'database-config.php';
require 'server/log_to_sql.php';

$appName = $_POST['applicantName'];
$pis = $_POST['pis'];
$rank = $_POST['rank'];
$relation = $_POST['relation'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$hospitalName = $_POST['hospitalName'];
$hospitalAddress = $_POST['hospitalAddress'];
$policestationNo = $_POST['idNo'];
$diaryNo = $_POST['diaryNo'];
$refHospitalname = $_POST['refHospitalname'];
$disease = $_POST['disease'];
$diaryDate = $_POST['diaryDate'];
$amtAsked = $_POST['amtAsked'];
$claim = $_POST['ctype'];
$claim_type = "";
$applicationDate = $_POST['applicationDate'];
$amtGranted = 0;
$amtDue = $_POST['amtDue'];

try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if($claim == "advance"){
        
        $claim_type = "ADV_CLAIM";
                       $amtGranted = 0.9 * $amtAsked;
            
        
        /*case "adjust": $amtGranted = $_POST['amt_granted'];
                        $amtDue = $amtAsked - $amtGranted;
                        break;
	     default : $claim_type = "Invalid Claim!";*/
    
$sql = "INSERT INTO form (applicant_name, pis, rank, relation, startdate, enddate, hospital_name, hospital_address, police_station_no, diary_no, ref_hospital_name, disease, diary_date, amt_asked, claim_type, application_date, amt_granted, amt_due ) 

VALUES ('$appName', '$pis', '$rank', '$relation', '$startDate', '$endDate', '$hospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo','$refHospitalname','$disease', '$diaryDate',$amtAsked, '$claim_type','$applicationDate',$amtGranted,$amtDue )";


    $dbh->exec($sql);
    
     $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $row = $q->fetch();
    $appid = $row['app_id'];
     $sql1 = "";
    if($amtGranted > 200000){
        $sql1 = "UPDATE form SET status = 'PHQ' WHERE app_id = '$appid' ";
      $dbh->exec($sql1);
       // echo "sucess";
    }
    else{
        $sql1 = "UPDATE form SET status = 'HAG' WHERE app_id = '$appid' ";
     $dbh->exec($sql1);
    }
}
    
elseif($claim == "adjust"){
    
    $diaryNo = $_POST['diary_no'];

    $sql = "UPDATE form SET amt_due = $amtDue WHERE diary_no = '$diaryNo' ";
    $dbh->exec($sql);
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
