<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$ino=$_POST['ino'];
$bh=$_POST['bh'];
$lx=$_POST['lx'];
$mc=$_POST['mc'];
$sj=$_POST['sj'];
$dd=$_POST['dd'];
$jl=$_POST['jl'];
$cp=$_POST['cp'];
$tc=$_POST['tc'];
$sql="update item set ino='$bh',iname='$mc',itype='$lx',itime='$sj',place='$dd',yrecord='$jl',rno='$cp',day='$tc'  where ino='$ino'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>