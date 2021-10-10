<?php require '../Connections/connect.php'; ?>
<?php
$ino=$_POST['ino'];
$pno=$_POST['pno'];
$nino=$_POST['nino'];
$npno=$_POST['npno'];
$ncj=$_POST['ncj'];
$time=date("Y-m-d h:s:i");
$sql="update grade set grade='$ncj',pno='$npno',ino='$nino' where ino='$ino' and pno='$pno'";
if(mysqli_query($link,$sql)){
    echo '1';
}
else {
    echo $sql;
}
?>
