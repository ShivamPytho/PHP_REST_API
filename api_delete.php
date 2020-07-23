<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method:DELETE');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Method,Authorization, X-Requested-with');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include "connfig.php";

$sql =  "DELETE FROM student WHERE id ={$student_id}";
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message' => 'RECORD DELETE SUCCESSFULLY', 'status' => 'true'));
}
else
{
    
    echo json_encode(array('message' => 'NOT DELETE DATA', 'status' => 'false'));
}

?>

