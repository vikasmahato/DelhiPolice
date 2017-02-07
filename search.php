<?php
require_once 'config.php';
if(!empty($_POST['type'])){
	$name = $_POST['name_startsWith'];
	
    $query = "SELECT * FROM products where  diary_no LIKE '%".strtoupper($name)."%'";
    
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}

?>

