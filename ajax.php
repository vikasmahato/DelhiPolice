<?php
require_once 'config.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
    $h_type = $_POST['h_type'];
 $category = $_POST['category'];	
    $query = "SELECT * FROM products where  UPPER($type) LIKE '%".strtoupper($name)."%'";
    
      
   /* $sql2 = "SELECT app_id FROM form ORDER BY app_id DESC LIMIT 1 ";
    
    $q = $dbh->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $var = $q->fetch();
    $ht = $var['hospType'];
    
    $ht=='nonnabh' ? $htype='non_nabh_nabl' : $htype='nabh_nabl';*/
    
    
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['productCode'].'|'.$row['productName'].'|'.$row[$h_type];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}

?>

