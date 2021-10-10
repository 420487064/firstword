<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$n=$_GET['n'];
function owe_1($link,$pno){
      $sql="SElECT * FROM jion,item,player,college,grade where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  grade.pno=jion.pno and 
      grade.ino=jion.ino  and   jion.pno='$pno' limit 7";
      $row=mysqli_query($link,$sql);
      $a="";
      while($s =mysqli_fetch_assoc($row)){
      $a.='
      <div class="midbox">

            <div>'.$s['gno'].'</div>
            <div>'.$s['grade'].'</div>
            <div>'.$s['itype'].'</div>
            <div>'.$s['iname'].'</div>
            <div>'.$s['entime'].'</div>

          </div>
         ';
      }
      $a.="@1";
      $sql=" SElECT * FROM jion,item,player,college,grade where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  grade.pno=jion.pno and grade.ino=jion.ino
      and   jion.pno='$pno'";
      $row=mysqli_query($link,$sql);
      $m=mysqli_num_rows($row);
      $a.='@'.ceil($m/7);
      return $a;
}


if($n==1){
    $pno=$_SESSION['id'];
    echo owe_1($link,$pno);
}

?>