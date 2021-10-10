<?php require '../Connections/connect.php'; ?>
<?php
$rno = isset($_POST['rno']) ? htmlspecialchars($_POST['rno']) : '';
$sql="delete from referee where rno='$rno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>