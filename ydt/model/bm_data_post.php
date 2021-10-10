<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$ino = isset($_POST['ino']) ? htmlspecialchars($_POST['ino']) : '';
$pno = isset($_POST['pno']) ? htmlspecialchars($_POST['pno']) : '';
$nino = isset($_POST['nino']) ? htmlspecialchars($_POST['nino']) : '';
$npno = isset($_POST['npno']) ? htmlspecialchars($_POST['npno']) : '';

$sql="UPDATE jion set ino='$nino',pno='$npno' where pno='$pno' and ino='$ino' ";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>