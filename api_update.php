<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method:PUT');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Method,Authorization, X-Requested-with');

$data = json_decode(file_get_contents("php://input"), true);


$id = $data['sid'];
$name = $data['sname'];
$address = $data['saddress'];
$city = $data['scity'];


include "connfig.php";


$sql =  "UPDATE `student` SET `name` = '$name', `address` = '$address', `city` = '$city' WHERE`id` = $id";
#$sql = "INSERT INTO student ( name, address, city) VALUES ('$name',  '$address', '$city')";
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message' => 'Student Recored Update Successfully', 'status' => 'true'));
}
else
{
    
    echo json_encode(array('message' => 'Student Recored Not Update Successfully', 'status' => 'false'));
}

?>

