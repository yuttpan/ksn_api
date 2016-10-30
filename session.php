<?php
session_start();
//$status=$_SESSION['login'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$status = isset($_SESSION['login']) ? $_SESSION['login'] : null;


$resp['username'] = $username ;
$resp['status'] = $status ;
$result = json_encode($resp); 

echo  $result;
header("Access-Control-Allow-Origin: *");
header("content-type:text/javascript;charset=utf-8");
header("Content-Type: application/json; charset=utf-8", true, 200);

?>