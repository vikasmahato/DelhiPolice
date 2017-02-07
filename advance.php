<?php


$diary = $_POST['diaryNo'];
require 'database-config.php';

try {
    
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM form WHERE diary_no = $diary";                         
            //nothing here
            foreach ($dbh->query($sql) as $row) {
                
                  /*var data={ 
  "id" : 12,
  "name": "Jack",
  "description": "Description"
};
     */           
              $arr = array('applicant_name' => $row['applicant_name'], 'disease' => $row['disease'],'pis' => $row['pis'],'rank' => $row['rank'], 'relation' => $row['relation'],'startdate' => $row['startdate'],'enddate' => $row['enddate'],'hospital_name' => $row['hospital_name'],'hospital_address' => $row['hospital_address'],'police_station_no' => $row['police_station_no'],'diary_no' => $row['diary_no'],'ref_hospital_name' => $row['ref_hospital_name'],'diary_date' => $row['diary_date'],'amt_granted' => $row['amt_granted'],'phq_memo' => $row['phq_memo'],'phq_memo_date' => $row['phq_memo_date']);
   echo json_encode($arr);          
            }
    
}
catch(PDOException $e)
    {
    
        echo $sql . "<br>" . $e->getMessage();
    }

$dbh = null;

?>