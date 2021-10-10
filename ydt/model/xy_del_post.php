<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$cno=$_POST['cno'];
$sql="delete from college where cno='$cno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>