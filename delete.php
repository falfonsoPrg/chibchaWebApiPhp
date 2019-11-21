<?php 

if(isset($_POST['filename'])){
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$filename = $_POST['filename'];
$path = "hostings/".$user_id."/".$name."/".$filename;

$r = unlink($path);
header('Data:'.json_encode($path));
header('Content-type: application/json');
echo json_encode($r);
}

?>