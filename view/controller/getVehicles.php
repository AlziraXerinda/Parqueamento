<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'vehicles');

$rs=1;



$query = "SELECT * FROM autos";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>