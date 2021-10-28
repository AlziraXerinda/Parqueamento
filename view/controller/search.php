

<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'vehicles');


$brand = $_POST['brand'];




$reg= "select * from autos where brand LIKE '$brand%'";
mysqli_query($con,$reg);

$query =  "select * from autos where brand LIKE '$brand%'";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>

