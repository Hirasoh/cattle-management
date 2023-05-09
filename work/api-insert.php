<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['sname'];
$location = $data['sage'];
//$status = $data['scity'];
if ($location <= "20") {
		$status = 'In Range';
  
} else {
	$status = 'Out Range';
  
}
?>
include "config.php";
$sql = "INSERT INTO Location(Cattle_name, Location, status) VALUES ('{$name}', '{$location}', '{$status}')";


if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Cattle Record Inserted.', 'status' => true));

}else{

 echo json_encode(array('message' => 'Cattle Record Not Inserted.', 'status' => false));

}
?>
