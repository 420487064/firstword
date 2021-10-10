<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$bh=$_POST['bh'];
$xh=$_POST['xh'];
$xm=$_POST['xm'];
$xbie=$_POST['xbie'];
$mm=$_POST['mm'];
$xbu=$_POST['xbu'];
$yh=$_POST['yh'];
$sql="insert into player values('$bh','$xh','$xm','$xbie','$xbu','$mm','$yh')";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>