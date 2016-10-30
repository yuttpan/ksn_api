<?php
header('Access-Control-Allow-Origin: * ' );

include_once 'DB.php';



  $sql = "select an,ThaiDates(dchdate) as dchdate,(DATEDIFF(now(),dchdate))as ddate,a.pttype,p.name from an_stat a
LEFT OUTER JOIN pttype p on a.pttype = p.pttype
where dchdate >= '2015-10-01' and p.hipdata_code in('ucs','ofc','lgo') 
and a.pttype not in ('10','20') and
an not in(select an from m_registerdata
where concat(left(DATEDSC,4)-543,'-',MID(DATEDSC,5,2),'-',RIGHT(DATEDSC,2)) >= '2015-10-01')
ORDER BY ddate 

";
       //$db2 = getConnected($db_host, $db_name, $db_user, $db_pass);
    //   foreach( $db->query($sql2) as $row){
    //     array_push($result,$row) ;
    //   };


    //  return json_encode($result);
         //echo json_encode($a->fetchAll(PDO::FETCH_OBJ));
$resource = mysqli_query($link, $sql);
$count_row = mysqli_num_rows($resource);
$coursesArray = array();
if($count_row > 0) {
 while ($result = mysqli_fetch_assoc($resource)) {
//$rows[]=$result;
   $coursesArray[] = $result;

 }
 //$data = json_encode($rows);
//	$totaldata = sizeof($rows);
//	$results = '{"results":'.$data.'}';
echo json_encode($coursesArray);
$fp = fopen('file4.json', 'w+');
fwrite($fp, json_encode($coursesArray));
fclose($fp);
}else{
//  $foo->hello = "world";
//$coursesArray[]->hello = "world";
//echo json_encode($coursesArray);
//$coursesArray[] = name:'No Data' ;
}

    mysqli_close($link);

    

?>
