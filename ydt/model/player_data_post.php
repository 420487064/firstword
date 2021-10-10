<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$pno=$_POST['pno'];
$bh=$_POST['bh'];
$xh=$_POST['xh'];
$xm=$_POST['xm'];
$xbie=$_POST['xbie'];
$mm=$_POST['mm'];
$xbu=$_POST['xbu'];
$yh=$_POST['yh'];
$sql="update player set pno='$bh',pid='$xh',pname='$xm',psex='$xbie',sdept='$xbu',mima='$mm',cno='$yh' where pno='$pno'";
if(mysqli_query($link,$sql)){
	echo '1';
}
else {
	echo '2';
}
?>