<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];

include "connfig.php";

$sql =  "SELECT * FROM student WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Querry failed");
if(mysqli_num_rows($result) > 0)
{
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    
    echo json_encode(array('message' => 'search not found', 'status' => 'false'));
}

?>

