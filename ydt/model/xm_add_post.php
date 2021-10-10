<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$bh=$_POST['bh'];
$lx=$_POST['lx'];
$mc=$_POST['mc'];
$sj=$_POST['sj'];
$dd=$_POST['dd'];
$jl=$_POST['jl'];
$cp=$_POST['cp'];
$tc=$_POST['tc'];
$sql="insert into item values('$bh','$mc','$lx','$sj','$dd','$jl','$cp','$tc')";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>