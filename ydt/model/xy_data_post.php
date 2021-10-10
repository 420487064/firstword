<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$cno=$_POST['cno'];
$yh=$_POST['yh'];
$xy=$_POST['xy'];

$sql="update college set cno='$yh',cname='$xy' where cno='$cno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>