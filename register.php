<?php

header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';



$user = isset($_GET['var_user']) ? $_GET['var_user'] : null;
$password = isset($_GET['var_password']) ? $_GET['var_password'] : null;
$name = isset($_GET['var_name']) ? $_GET['var_name'] : null;
$email = isset($_GET['var_email']) ? $_GET['var_email'] : null;
$tel = isset($_GET['var_tel']) ? $_GET['var_tel'] : null;

$resp['status'] = 'error';
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO user (username,password,name,tel,email)";
$sql .= "VALUES('$user','$password','$name','$tel','$email')";

//echo $sql ;
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