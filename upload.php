<?php
header('Content-type: application/json');

$status = "OK";
if(isset($_FILES["fileToUpload"])){
$message="";
$id = $_GET["user_id"];
$name = $_GET['name'];


$target_dir = 'hostings/'.$id.'/'.$name."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $message= "Sorry, there was an error uploading your file.";
    }
}

}
$message = $target_file ;
header('Data:'.$message);
echo json_encode(array("status"=>$status,"message"=>$message));


?>