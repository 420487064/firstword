<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$n = $_GET['n'];

function a($link)
{
  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $a = "";
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '<li><a href="../next/next.html?ino=' . $s['ino'] . '">' . $s['iname'] . '</a></li>';
  }
  return $a;
}

function b($link, $m)
{

  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $w = mysqli_fetch_assoc($row);
  $ino = $m;
  if($ino=='null')$ino=$w['ino'];
  if ($w['itype'] == "田赛") $type = "米";
  else $type = "秒";

  if ($w['itype'] == "田赛") $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade desc limit 2";
  else  $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade limit 2";
  $row = mysqli_query($link, $sql);
  $a = "";
  $q = 1;
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '
       <div class="midbox">
      <div>' . $q . '</div>
      <div>' . $s['cname'] . '</div>
      <div>' . $s['pid'] . '</div>
      <div>' . $s['pname'] . '</div>
      <div>' . $s['grade'] . $type . '</div>
    </div>
    ';
    $q++;
 }

  $sql = "select * from grade where ino='$ino'";
  $row = mysqli_query($link, $sql);
  $num = ceil(mysqli_num_rows($row) / 2);
  $a .= '@' . $num;
  
  $a.='@'.$w['iname'];
  return $a;
}

function c($link,$m,$y)
{
  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $w = mysqli_fetch_assoc($row);
  $ino = ($m != 'null') ? $m : $w['ino'];
  if ($w['itype'] == "田赛") $type = "米";
  else $type = "秒";

  $ys=($y-1)*2;

  if ($w['itype'] == "田赛") $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade desc limit $ys,2";
  else  $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade limit $ys,2";
  $row = mysqli_query($link, $sql);
  $a = "";
  $q = $ys+1;
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '
     <div class="midbox">
    <div>' . $q . '</div>
    <div>' . $s['cname'] . '</div>
    <div>' . $s['pid'] . '</div>
    <div>' . $s['pname'] . '</div>
    <div>' . $s['grade'] . $type . '</div>
  </div>
  ';
    $q++;
  }
  
  return $a;
}



function d($link)
{
  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $a = "";
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '<li><a index-data="' . $s['ino'] . '">' . $s['iname'] .'</a></li>';
  }
  return $a;
}

function f($link,$m,$y)
{
  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $w = mysqli_fetch_assoc($row);
  $ino = ($m != 'null') ? $m : $w['ino'];
  if ($w['itype'] == "田赛") $type = "米";
  else $type = "秒";

  $ys=($y-1)*2;

  if ($w['itype'] == "田赛") $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade desc limit $ys,2";
  else  $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade limit $ys,2";
  $row = mysqli_query($link, $sql);
  $a = "";
  $q = $ys+1;
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '
     <div class="midbox">
    <div>' . $q . '</div>
    <div>' . $s['cname'] . '</div>
    <div>' . $s['pid'] . '</div>
    <div>' . $s['pname'] . '</div>
    <div>' . $s['grade'] . $type . '</div>
  </div>
  ';
    $q++;
  }
  
  return $a;
}



function g($link, $m)
{

  $sql = "select * from item order by ino";
  $row = mysqli_query($link, $sql);
  $w = mysqli_fetch_assoc($row);
  $ino = $m;
  if($ino=='null')$ino=$w['ino'];
  if ($w['itype'] == "田赛") $type = "米";
  else $type = "秒";

  if ($w['itype'] == "田赛") $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade desc limit 2";
  else  $sql = "select * from grade,player,college where grade.ino='$ino' and player.pno=grade.pno  and college.cno=player.cno order by grade limit 2";
  $row = mysqli_query($link, $sql);
  $a = "";
  $q = 1;
  while ($s = mysqli_fetch_assoc($row)) {
    $a .= '
       <div class="midbox">
      <div>' . $q . '</div>
      <div>' . $s['cname'] . '</div>
      <div>' . $s['pid'] . '</div>
      <div>' . $s['pname'] . '</div>
      <div>' . $s['grade'] . $type . '</div>
    </div>
    ';
    $q++;
 }

  $sql = "select * from grade where ino='$ino'";
  $row = mysqli_query($link, $sql);
  $num = ceil(mysqli_num_rows($row) / 2);
  $a .= '@' . $num;
  
  $a.='@'.$w['iname'];
  $a.='@1';
  return $a;
}


if ($n == 1) {
  echo a($link);
} else if ($n == 2) {
  $m = $_GET['m'];
  //   echo $_GET['m'];
  echo b($link, $m);
} else if ($n == 3) {
  $m = $_GET['m'];
  //   echo $_GET['m'];
  $y= $_GET['y'];
  echo c($link, $m,$y);
}
else if($n==4){
  echo d($link);
}
else if($n==5){
	$m = $_GET['m'];
  echo g($link,$m);
}

?>