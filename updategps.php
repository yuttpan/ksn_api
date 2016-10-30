<?php

header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';



$id = isset($_GET['var_id']) ? $_GET['var_id'] : null;
$headperson = isset($_GET['var_headperson']) ? $_GET['var_headperson'] : null;
$latitude = isset($_GET['var_latitude']) ? $_GET['var_latitude'] : null;
$longitude = isset($_GET['var_longitude']) ? $_GET['var_longitude'] : null;
$user = isset($_GET['var_user']) ? $_GET['var_user'] : null;

$resp['status'] = 'error';
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE house_survey SET latitude='{$latitude}'";
$sql .= ",head_person = '{$headperson}'";
$sql .= ",longitude = '{$longitude}'";
$sql .= ",user_survey = '{$user}'";
 $sql .= "WHERE id='{$id}'";

if (mysqli_query($link, $sql)) {
   // echo "Record updated successfully";
    $resp['status'] = 'success' ;
} else {
   // echo "Error updating record: " . mysqli_error($link);
}

mysqli_close($link);

$result = json_encode($resp); 

echo  $result

?>