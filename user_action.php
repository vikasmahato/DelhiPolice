<?php
session_start();
require 'crud.php';
require 'database-config.php';
if(isset($_POST['approve_btn'])){
      $id = $_POST['sid'];       
            $comment = $_POST['inputComment'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM form WHERE app_id = $id";                         
            //nothing here
            foreach ($dbh->query($sql) as $row) {
                $value = $row;           
            }
           
            switch ($_SESSION["sess_userrole"]){
                case "hag":
                    update_data($_SESSION["sess_userrole"], $id, $comment);
                    break;
                case "acp":
                   update_data($_SESSION["sess_userrole"], $id, $comment);
                    break;
                case "admin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);
                    break;
                case "dealing":
                    update_data($_SESSION["sess_userrole"], $id, $comment);
                    break;
                case "iadmin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);
                    break;
                default:
                     header ("Location: index.php");
            }
}
elseif(isset($_POST['reval_btn'])){
    echo "reeval";
     //deny action
            $id = $_POST['sid'];
            $comment = $_POST['inputComment'];
            
            if ($_SESSION["sess_userrole"]!=null){
                  reeval($_SESSION["sess_userrole"], $id, $comment);
            }
}

?>