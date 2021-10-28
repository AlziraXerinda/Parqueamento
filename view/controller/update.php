

<?php
 


 session_start();
 
 $con = mysqli_connect('localhost','root','');
 
 mysqli_select_db($con,'vehicles');
 
 
 $id = $_POST['id'];
 $brand = $_POST['brand'];
 $model = $_POST['model'];
 $motor = $_POST['motor'];
 $year = $_POST['year'];
 $mileage = $_POST['mileage'];
 $price = $_POST['price'];
 
 
 
 $reg= "update autos set brand='$brand',model='$model',motor='$motor',year='$year',mileage='$mileage',price='$price'  where id = '$id'";
 mysqli_query($con,$reg);
 
 $query = "SELECT * FROM autos";
 
 $result = mysqli_query( $con, $query );
 $num= mysqli_num_rows($result);
 $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
 echo json_encode($json );
 
 
 ?>
 
 