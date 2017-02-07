<?php
require '../database-config.php';
require_once '../dompdf/autoload.inc.php';

$name ="";
$value = array();

            
            $id = $_POST['id'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM form WHERE app_id = $id";
            
   
       foreach ($dbh->query($sql) as $row) {
           $value = $row;           
       }

generate1('docs/acp/form1.php',$value,$id);

generate2('docs/acp/form2.php',$value,$id);

generate3('docs/acp/form3.php',$value,$id);

generate4('docs/acp/form4.php',$value,$id);

  /*  if (isset($_POST['form1_btn'])) { echo "f1";generate1('docs/acp/form1.php',$value,$id);}
           else if (isset($_POST['form2_btn'])) {echo "f2";generate2('docs/acp/form2.php',$value,$id);}
           else if (isset($_POST['form3_btn'])) {generate3('docs/acp/form3.php',$value,$id);}
           else if (isset($_POST['form4_btn'])) {generate4('docs/acp/form4.php',$value,$id);}
           else if (isset($_POST['form5_btn'])) {generate5('docs/acp/form5.php',$value,$id);}
           else if (isset($_POST['form6_btn'])) {generate6('docs/acp/form6.php',$value,$id);}
           else if (isset($_POST['form7_btn'])) {generate7('docs/acp/form7.php',$value,$id);}
           else if (isset($_POST['form8_btn'])) {generate8('docs/acp/form8.php',$value,$id);}
           else if (isset($_POST['form9_btn'])) {generate9('docs/acp/form9.php',$value,$id);}
           else if (isset($_POST['form10_btn'])) {generate10('docs/acp/form10.php',$value,$id);}
           else if (isset($_POST['form11_btn'])) {generate11('docs/acp/form11.php',$value,$id);}
           else if (isset($_POST['form12_btn'])) {generate12('docs/acp/form12.php',$value,$id);}
           else if (isset($_POST['form13_btn'])) {generate13('docs/acp/form13.php',$value,$id);}
           else if (isset($_POST['form14_btn'])) {generate14('docs/acp/form14.php',$value,$id);}
           else if (isset($_POST['form15_btn'])) {generate15('docs/acp/form15.php',$value,$id);}
           else if (isset($_POST['form16_btn'])) {generate16('docs/acp/form16.php',$value,$id);}
*/


function generate1($path_to_file ,$value,$filename){ 
   require 'docs/acp/form1.php';
pdf_create($form1, $filename);
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
$dompdf->stream($filename.".pdf");
  //  $dompdf->stream($filename.".pdf");
    
    $pdf = $dompdf->output();
$file_location = "docs/";
file_put_contents($file_location,$pdf); 
    
}

?>