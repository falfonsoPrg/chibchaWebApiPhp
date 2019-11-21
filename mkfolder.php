<?php
header('Content-type: application/json');

$status = "OK";
if(isset($_POST['user_id'])){
$message="";
$id = $_POST['user_id'];
$name = $_POST['name'];
	if (!file_exists('hostings/'.$id.'/'.$name)) {
   		mkdir('hostings/'.$id.'/'.$name, 0777, true);
		$message="Create succesfully";
	}else{
		$status = "FAIL";
		$message="Folder already exist";
	}
}
header('Data:'.$message);
echo json_encode(array("status"=>$status,"message"=>$message));
?>