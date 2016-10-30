<?php
header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';




 $villagecode = isset($_GET['village_code']) ? $_GET['village_code'] : null;
// $password = isset($_GET['var_password']) ? $_GET['var_password'] : null;
//$resp['status'] = $username;

 $sql="select * from house_survey where village_code ='$villagecode'  ";
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
