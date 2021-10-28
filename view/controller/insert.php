<?php
 


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'vehicles');


$brand = $_POST['brand'];
$model = $_POST['model'];
$motor = $_POST['motor'];
$year = $_POST['year'];
$mileage = $_POST['mileage'];
$price = $_POST['price']; 


$reg= "insert into autos (brand, model, motor, year, mileage, price) values ('$brand','$model','$motor','$year','$mileage','$price')";
mysqli_query($con,$reg);

$query = "SELECT * FROM autos";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );
