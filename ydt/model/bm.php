<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];


function bm_data($link){
     $sql="SElECT * FROM jion,item,player,college where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno order by jion.jtime DESC limit 7";
     $row=mysqli_query($link,$sql);
     $a="";
     while($s =mysqli_fetch_assoc($row)){
     $a.='
     <div class="midbox" index-pno="'.$s['pno'].'" index-ino="'.$s['ino'].'">
      <div>'.date("Y-m-d",strtotime($s['jtime'])).' </div>
         <div>'.$s['cname'].'</div>
         <div>'.$s['pid'].'</div>
         <div>'.$s['pname'].'</div>
         <div>'.$s['itype'].'</div>
         <div>'.$s['iname'].'</div> 
         <div><a class="xiugai" href="bm_data.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">修改</a></div>
      <div><a class="delete" href="bm_delete.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">删除</a></div>
     </div>
        ';
     }
     $a.="@1";

     $sql="SElECT * FROM jion,item,player,college where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno";
     $row=mysqli_query($link,$sql);
     $m=mysqli_num_rows($row);
     $a.='@'.ceil($m/7);
     return $a;
};

function bm_fy($link,$m){
   $t=($m-1)*7;
   $sql="SElECT * FROM jion,item,player,college where item.ino=jion.ino and jion.pno=player.pno and college.cno=player.cno order by jion.jtime  DESC limit $t,7";
   $row=mysqli_query($link,$sql);
   $a="";
   while($s =mysqli_fetch_assoc($row)){
   $a.='
   <div class="midbox" index-pno="'.$s['pno'].'" index-ino="'.$s['ino'].'">
    <div>'.date("Y-m-d",strtotime($s['jtime'])).' </div>
       <div>'.$s['cname'].'</div>
       <div>'.$s['pid'].'</div>
       <div>'.$s['pname'].'</div>
       <div>'.$s['itype'].'</div>
       <div>'.$s['iname'].'</div> 
       <div><a class="xiugai" href="bm_data.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">修改</a></div>
    <div><a class="delete" href="bm_delete.html?index-pno='.$s['pno'].'&index-ino='.$s['ino'].'">删除</a></div>
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