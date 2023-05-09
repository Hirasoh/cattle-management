<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$location = $data['sage'];
$status = $data['scity'];

include "config.php";

$sql = "UPDATE Location SET Cattle_name = '{$name}', Location = {$location}, status = '{$status}' WHERE id = {$id}";

if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Cattle Record Updated Signals send to REID.', 'status' => true));
}else{
  echo json_encode(array('message' => 'Cattle Record Not Updated.', 'status' => false));
}


?>
