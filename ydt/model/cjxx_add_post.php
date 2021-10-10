<?php require '../Connections/connect.php'; ?>
<?php
$ino=$_POST['ino'];
$pno=$_POST['pno'];
$cj=$_POST['cj'];
$time=date("Y-m-d h:s:i");
$sql="insert into grade(grade,entime,pno,ino) values('$cj','$time','$pno','$ino')";
if(mysqli_query($link,$sql)){
    echo '1';
}
else {
    echo $sql;
}
?>
