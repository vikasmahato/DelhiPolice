<?php 

session_start();
require 'crud.php';
require 'database-config.php';
require_once 'dompdf/autoload.inc.php';
require 'server/logger.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$name ="";
$value = array();

        if (isset($_POST['approve_btn'])) {
            //approve action
           // echo "approve";
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
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "acp":
                   update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "admin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "dealing":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "iadmin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                default:
                     header ("Location: index.php");
            }
            
            
        } elseif (isset($_POST['deny_btn'])) {
            //deny action
            $id = $_POST['sid'];
            $comment = $_POST['inputComment'];
            
            if ($_SESSION["sess_userrole"]!=null){
                  delete($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
                
        } elseif(isset($_POST['reval_btn'])) {
          //  echo "hello";
             $id = $_POST['sid'];
            $comment = $_POST['inputComment'];
           // echo $comment;
            if ($_SESSION["sess_userrole"]!=null){
                  reeval($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
        }elseif(isset($_POST['memo_btn'])) {
          //  echo "hello";
             $id = $_POST['sid'];
            $memo = $_POST['inputMemo'];
		$memoDate = $_POST['inputMemoDate'];
           // echo $comment;
            if ($_SESSION["sess_userrole"]!=null){
                  //reeval($_SESSION["sess_userrole"], $id, $comment);
                 require 'database-config.php';
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $sql = "UPDATE form SET phq_memo='$memo', status='HAG', phq_memo_date='$memoDate' WHERE app_id=$id";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED sussesfully by user $user"; 
	header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
        }else{
            //No button pressed
        }


function generate1($path_to_file ,$value,$filename){ 
   require 'docs/acp/form1.php';
pdf_create($form1, $filename."form1");
}
function generate2($path_to_file ,$value,$filename){ 
   require 'docs/acp/form2.php';
pdf_create($form2, $filename);
}
function generate3($path_to_file ,$value,$filename){ 
   require 'docs/acp/form3.php';
pdf_create($form3, $filename);
}
function generate4($path_to_file ,$value,$filename){ 
   require 'docs/acp/form4.php';
pdf_create($form4, $filename);
}
function generate5($path_to_file ,$value,$filename){ 
   require 'docs/acp/form5.php';
pdf_create($form5, $filename);
}
function generate15($path_to_file ,$value,$filename){ 
   require 'docs/acp/form15.php';
pdf_create($form15, $filename);
}
function generate6($path_to_file ,$value,$filename){ 
   require 'docs/acp/form6.php';
pdf_create($form6, $filename);
}
function generate7($path_to_file ,$value,$filename){ 
   require 'docs/acp/form7.php';
pdf_create($form7, $filename);
}
function generate8($path_to_file ,$value,$filename){ 
   require 'docs/acp/form8.php';
pdf_create($form8, $filename);
}
function generate9($path_to_file ,$value,$filename){ 
   require 'docs/acp/form9.php';
pdf_create($form9, $filename);
}
function generate10($path_to_file ,$value,$filename){ 
   require 'docs/acp/form10.php';
pdf_create($form10, $filename);
}
function generate11($path_to_file ,$value,$filename){ 
   require 'docs/acp/form11.php';
pdf_create($form11, $filename);
}
function generate12($path_to_file ,$value,$filename){ 
   require 'docs/acp/form12.php';
pdf_create($form12, $filename);
}
function generate13($path_to_file ,$value,$filename){ 
   require 'docs/acp/form13.php';
pdf_create($form13, $filename);
}
function generate14($path_to_file ,$value,$filename){ 
   require 'docs/acp/form14.php';
pdf_create($form14, $filename);
}


function pdf_create($html, $filename, $stream=TRUE){

    // instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
    // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
  
    
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);
  //  $dompdf->stream($filename.".pdf");
    
    $pdf = $dompdf->output();
$file_location = "docs/";
file_put_contents($file_location,$pdf); 
    
}
    
?>
