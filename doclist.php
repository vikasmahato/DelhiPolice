<?php
session_start();
require 'fetch.php';
if($_SESSION["sess_userrole"]!="dealing"){
    header ("Location: index.php");
}

    if(isset($_POST['reeval'])){
        $id = $_POST['id'];
 
         try{
         require 'database-config.php';

             $status = "";
 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM form WHERE app_id = $id";
            foreach ($dbh->query($sql) as $row) {
                echo $row['status'];
                if($row['status']=="REEVAL_IADMIN"){ $status = "I_ADMIN"; }
                elseif($row['status']=="REEVAL_HAG"){ $status = "HAG"; }
                elseif($row['status']=="REEVAL_ACP"){ $status = "ACP"; }
                elseif($row['status']=="REEVAL_DCP"){ $status = "DCP";}
            }
             
        $sql = "UPDATE form SET status = '$status' WHERE app_id = $id;";
             $dbh->exec($sql);
             header("Location: {$_SERVER["HTTP_REFERER"]}");
        
        
    }catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
        
        
    }
    ?>
