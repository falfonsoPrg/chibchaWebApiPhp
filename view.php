<?php

$status = "OK";
if(isset($_GET['user_id'])){
$message="OK recieved";
$id = $_GET['user_id'];
$name = $_GET['name'];
	$path = 'hostings/'.$id.'/'.$name;
	$files = scandir($path);
	$files = array_diff(scandir($path), array('.', '..'));
$sum = 0;
$path = './hostings/'.$id.'/'.$name;
$dh = dir($path);
foreach($files as $file){
	$realfile = $path . "/" . $file;
	$sum = $sum + filesize($realfile);
}
$sum = round(($sum / 1048576),2);
$sum = $sum."MB";
$files = array_merge($files, array("size"=>$sum));
header('Data:'.json_encode($files));
header('Content-type: application/json');
echo json_encode($files);
}
?>
