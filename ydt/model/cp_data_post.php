<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$rno = isset($_POST['rno']) ? htmlspecialchars($_POST['rno']) : '';
$nrno = isset($_POST['nrno']) ? htmlspecialchars($_POST['nrno']) : '';
$nname = isset($_POST['nname']) ? htmlspecialchars($_POST['nname']) : '';
$nmima=isset($_POST['nmima']) ? htmlspecialchars($_POST['nmima']) : '';
$sql="update referee set rno='$nrno',mima='$nmima',name='$nname' where rno='$rno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>