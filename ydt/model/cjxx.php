<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];


function bm_data($link){
     $sql=" SElECT * FROM jion,item,player,college,grade where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  grade.pno=jion.pno and grade.ino=jion.ino
      order by grade.gno desc  limit 7";
     $row=mysqli_query($link,$sql);
     $a="";
     while($s =mysqli_fetch_assoc($row)){
     $a.='
     <div class="midbox" index-pno="'.$s['pno'].'" index-ino="'.$s['ino'].'">
      <div>'.$s['gno'].' </div>
         <div>'.$s['cname'].'</div>
         <div>'.$s['pid'].'</div>
         <div>'.$s['pname'].'</div>
         <div>'.$s['iname'].'</div>
         <div>'.$s['grade'].'</div> 
         <div><a class="xiugai" href="cjxx_data.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">修改</a></div>
      <div><a class="delete" href="cjxx_delete.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">删除</a></div>
     </div>
        ';
     }
     $a.="@1";
     $sql=" SElECT * FROM jion,item,player,college,grade where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  grade.pno=jion.pno and grade.ino=jion.ino
     ";
     $row=mysqli_query($link,$sql);
     $m=mysqli_num_rows($row);
     $a.='@'.ceil($m/7);
     return $a;
};



function bm_fy($link,$m){
   $t=($m-1)*7;
   $sql=" SElECT * FROM jion,item,player,college,grade where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno and  grade.pno=jion.pno and grade.ino=jion.ino
   order by grade.gno desc limit $t,7";
   $row=mysqli_query($link,$sql);
   $a="";
   while($s =mysqli_fetch_assoc($row)){
      $a.='
      <div class="midbox" index-pno="'.$s['pno'].'" index-ino="'.$s['ino'].'">
       <div>'.$s['gno'].' </div>
          <div>'.$s['cname'].'</div>
          <div>'.$s['pid'].'</div>
          <div>'.$s['pname'].'</div>
          <div>'.$s['iname'].'</div>
          <div>'.$s['grade'].'</div> 
          <div><a class="xiugai" href="cjxx_data.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">修改</a></div>
       <div><a class="delete" href="cjxx_delete.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">删除</a></div>
      </div>
         ';
      }
   $a.="@".$m;

   return $a;
};


if($n==1){
   echo bm_data($link);
}
else if($n==2){
   $m=$_GET['m'];
   echo bm_fy($link,$m);
}      



?>