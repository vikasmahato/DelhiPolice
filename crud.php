<?php


function read_data($id){
    
        require 'database-config.php';
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT app_id, applicant_name, pis, rank, relation, hospital_name, hospital_address, police_station_no, si_no, diary_no, ref_hospital_name, a_cghs_category, disease, application_date, amt_asked, amt_granted FROM form WHERE app_id='$id'";
         $stmt = $dbh->query($sql);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
         
        
}

function update_data($user, $id, $comment){   
    
    if ($user=='hag') { $status='I_ADMIN'; }
    else if ($user=='iadmin') { $status='ACP'; }
    else if ($user=='dealing') $status='HAG';
    else if ($user=='acp') { $status='DCP'; }
    else if ($user=='admin'){ $status='APPROVED'; }
    else echo "Invalid User";
    
        try{
        require 'database-config.php';
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE form SET status='$status' WHERE app_id=$id";
    
        $temp = $_SESSION['sess_userrole'];
        $sql2 = "INSERT INTO comments (app_id, user_id, comment) VALUES ('$id','$temp' , '$comment')";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
            
            $stmt2 = $dbh->prepare($sql2);
        $stmt2->execute();

       // echo $stmt->rowCount() . " records UPDATED sussesfully by user $user";
        }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
        }
$conn = null;
}

function delete($user, $id, $comment){
    try{
        require 'database-config.php';
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comment = $comment + " Re-evaluation by $user";
        
        if($_SESSION["sess_userrole"]!="hag") $stat = 'REEVAL_HAG';
        else if($_SESSION["sess_userrole"]!="acp") $stat = 'REEVAL_ACP';
        else if($_SESSION["sess_userrole"]!="iadmin") $stat = 'REEVAL_IADMIN';
        
        $sql = "UPDATE form SET status='$stat' WHERE app_id=$id";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED sussesfully by user $user";

        }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
        }
$conn = null;    
}

function reeval($user, $id, $comment){
    try{
        require 'database-config.php';
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comment = $comment + " Re-evaluation by $user";
        
        if($_SESSION["sess_userrole"]=="hag") $stat = 'REEVAL_HAG';
        else if($_SESSION["sess_userrole"]=="acp") $stat = 'REEVAL_ACP';
        else if($_SESSION["sess_userrole"]=="iadmin") $stat = 'REEVAL_IADMIN';
        
        $sql = "UPDATE form SET status='$stat' WHERE app_id=$id";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED sussesfully by user $user";

        }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
        }
$conn = null;    
}

?>