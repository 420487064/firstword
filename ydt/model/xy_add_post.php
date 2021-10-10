<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$yh=$_POST['yh'];
$xy=$_POST['xy'];
$sql="insert into college values('$yh','$xy')";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>