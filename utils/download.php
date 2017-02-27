<?php
   
require '../database-config.php';
require 'utils.php';

require_once '../dompdf/autoload.inc.php';
foreach (glob("classes/*.php") as $filename)
{
    include $filename;
}
use Dompdf\Dompdf;
$name ="";
$value = array();

            
            $id = $_POST['id'];
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM form WHERE app_id = $id";
            
   
       foreach ($dbh->query($sql) as $row) {
           $value = $row;
          
        
            if (isset($_POST['form1_btn'])){generate($value, '1');}
           else if (isset($_POST['form2_btn'])) {generate($value, '2');}
           else if (isset($_POST['form3_btn'])) {generate($value, '3');}
           else if (isset($_POST['form4_btn'])) {generate($value, '4');}
           else if (isset($_POST['form5_btn'])) {generate($value, '5');}
           else if (isset($_POST['form6_btn'])) {generate($value, '6');}
           else if (isset($_POST['form7_btn'])) {generate($value, '7');}
           else if (isset($_POST['form8_btn'])) {generate($value, '8');}
           else if (isset($_POST['form9_btn'])) {generate($value, '9');}
           else if (isset($_POST['form10_btn'])) {generate($value, '10');}
           else if (isset($_POST['form11_btn'])) {generate($value, '11');}
           else if (isset($_POST['form12_btn'])) {generate($value, '12');}
           else if (isset($_POST['form13_btn'])) {generate($value, '13');}
           else if (isset($_POST['form14_btn'])) {generate($value, '14');}
           else if (isset($_POST['form15_btn'])) {generate($value, '15');}
           else if (isset($_POST['form16_btn'])) {generate($value, '16');}
          else if (isset($_POST['form22_btn'])) {generate($value, '22');}
}

function generate($value, $s){
//	echo "hello";
    $rupee_word = rupee_to_word($value['amt_granted']);
    $data = get_data_for_calcSheet($value['app_id']);
    require '../docs/form1.php';
    require '../docs/form2.php';
    require '../docs/form3.php';
    require '../docs/form4.php';
    require '../docs/form5.php';
    require '../docs/form6.php';
    require '../docs/form7.php';
    
    require '../docs/form9.php';
    require '../docs/form10.php';
    
    require '../docs/form12.php';
    require '../docs/form13.php';
	
require '../docs/form15.php';   

 require '../docs/form22.php';
ini_set('display_errors', 1);

    $dompdf = new DOMPDF();
	$dompdf->load_html(${'form'.$s});
    	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
$dompdf->stream("file".$s.".pdf");
   
}

?>
