<?php
header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';



$_POST = json_decode(file_get_contents("php://input"),TRUE);
 $hcode = isset($_POST['hcode']) ? $_POST['hcode'] : null;
// $password = isset($_GET['var_password']) ? $_GET['var_password'] : null;
//$resp['status'] = $username;

 $sql="select hcode,count(*) as value from lab_head where hcode = '$hcode' and confirm_report = 'N' ";
$resource = mysqli_query($link, $sql);
$num = mysqli_num_rows($resource);
//$row = mysqli_fetch_assoc($resource);
if($num > 0) {
 while ($result = mysqli_fetch_assoc($resource)) {
//$rows[]=$result;
   $resp[] = $result;

 }
}



$result = json_encode($resp); 

echo  $result ;

?>
