<?php require '../Connections/connect.php'; ?>
<?php
$pno = $_GET['pno'];
$ino = $_GET['ino'];
$sql = "SElECT * FROM jion,item,player,college where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  jion.pno='$pno' and jion.ino='$ino'";
$row = mysqli_query($link, $sql);
$s =mysqli_fetch_assoc($row);
$a = '
          <div>时间 : <a>' . date("Y-m-d", strtotime($s['itime'])) . '</a></div>
          <div>学院 : <a>' . $s['cname'] . '</a></div>
          <div>学号 : <a>' . $s['pid'] . '</a></div>
          <div>姓名 : <a>' . $s['pname'] . '</a></div>
          <div>类型 : <a>' . $s['itype'] . '</a></div>
          <div>名称 : <a>' . $s['iname'] . '</a></div>
          ';
echo $a;
?>