<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$pno=$_POST['pno'];
$sql="delete from player where pno='$pno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>