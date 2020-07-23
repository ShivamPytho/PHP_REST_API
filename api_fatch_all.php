<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "connfig.php";

$sql =  "SELECT * FROM student";
$result = mysqli_query($conn, $sql) or die("SQL Querry failed");
if(mysqli_num_rows($result) > 0)
{
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message' => 'no record found', 'status' => 'false'));
}
?>

