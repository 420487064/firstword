<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$ino = isset($_POST['ino']) ? htmlspecialchars($_POST['ino']) : '';
$pno = isset($_POST['pno']) ? htmlspecialchars($_POST['pno']) : '';
$sql="DELETE from jion where pno='$pno' and ino='$ino'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>