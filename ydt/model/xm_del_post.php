<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$ino=$_POST['ino'];
$sql="delete from item where ino='$ino'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>