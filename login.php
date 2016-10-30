<?php
header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';



$resp['status'] = 'error';
 $username = isset($_GET['var_username']) ? $_GET['var_username'] : null;
 $password = isset($_GET['var_password']) ? $_GET['var_password'] : null;
//$resp['status'] = $username;
if($username != null && $password != null){
  $sql="select * from user where username ='".$username."' and password= '".$password."'   ";
$resource = mysqli_query($link, $sql);
$num = mysqli_num_rows($resource);
$row = mysqli_fetch_assoc($resource);

if($num > 0 ){




$resp['data'] = $row ;
$resp['status'] = 'success' ;


}

} else {
 // $resp['status'] = 'required' ;
}

$result = json_encode($resp); 

echo  $result


?>
