<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$rno = isset($_POST['rno']) ? htmlspecialchars($_POST['rno']) : '';
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$mima=isset($_POST['mima']) ? htmlspecialchars($_POST['mima']) : '';
$sql="insert into referee values('$rno','$name','$mima')";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>