<?php

header('Content-Type: application/json');  //write type and json
header('Access-Control-Allow-Origin: *');   //domon access name 
header('Access-Control-Allow-Method:POST'); //use API all method 
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Method,Authorization, X-Requested-with'); //

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$address = $data['saddress'];
$city = $data['scity'];


include "connfig.php";

$sql =  "INSERT INTO  student (name, address, city) VALUES( '{$name}', '{$address}' , '{$city}') ";
#
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message' => 'Student Recored inserted', 'status' => 'true'));
}
else
{
    
    echo json_encode(array('message' => 'Student Recored Not  inserted', 'status' => 'false'));
}

?>

