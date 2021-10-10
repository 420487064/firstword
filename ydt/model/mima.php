<?php require '../Connections/connect.php'; ?>
<?php
session_start();
function update($link,$qx,$id,$new){
 if($qx==1)$sql="update player set mima='$new' where pno='$id'";
  else if($qx==2)$sql="update admin set mima='$new' where ano='$id'";
  else if($qx==3)$sql="update referee set mima='$new' where rno='$id'";
  mysqli_query($link,$sql);
}


$qx=$_SESSION['qx'];
$id=$_SESSION['id'];
$new=$_POST['new'];
$old=$_POST['old'];
if($qx==1)$sql="select * from player where pno='$id'";
else if($qx==2)$sql="select * from admin where ano='$id'";
else if($qx==3)$sql="select * from referee where rno='$id'";
$row=mysqli_query($link,$sql);
$s=mysqli_fetch_assoc($row);
if($old!=$s['mima']){
    echo '2';
}
else{
    update($link,$qx,$id,$new);
    echo '1';
}
?>