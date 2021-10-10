<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$ino = isset($_POST['ino']) ? htmlspecialchars($_POST['ino']) : '';
$pno = isset($_POST['pno']) ? htmlspecialchars($_POST['pno']) : '';
//$pno=$_POST["pno"];
date_default_timezone_set('PRC');
$time=date('Y-m-d h:i:s');
$sql="INSERT INTO  jion (jtime,pno,ino) values('$time','$pno','$ino')";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>