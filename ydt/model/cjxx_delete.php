<?php require '../Connections/connect.php'; ?>
<?php
$ino = $_GET['ino'];
$pno = $_GET['pno'];
$sql = "select * from  item order by ino";
$row = $link->query($sql);
$a = ' 项目编号 : ' . $ino;

$sql = "select * from  item where ino='$ino'";
$row = $link->query($sql);
$s = mysqli_fetch_assoc($row);
$a .= '@类型 : ' . $s['itype'] . '@名称 : ' . $s['iname'] . '@';

$sql = "select * from jion where ino='$ino' order by pno desc";
$row = $link->query($sql);
$a .= '运动员编号 : ' . $pno;

$sql = "select * from player,college where player.pno='$pno' and  college.cno=player.cno ";
$row = $link->query($sql);
$s = mysqli_fetch_assoc($row);
$a .= '@学院 : ' . $s['cname'] . '@学号 : ' . $s['pid'] . '@姓名 : ' . $s['pname'];

$sql = "select * from grade where ino='$ino' and pno='$pno'";
$row = $link->query($sql);
$s = mysqli_fetch_assoc($row);
$a .= '@成绩 : ' . $s['grade'];

echo $a;
?>