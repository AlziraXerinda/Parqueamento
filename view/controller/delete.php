

<?php



session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'vehicles');


$id = $_POST['id'];



$reg = "delete from autos where id = '$id'";
mysqli_query($con, $reg);

$query = "SELECT * FROM autos";

$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);
$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($json);


?>
 
 