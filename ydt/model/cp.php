<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function cp_1($link){
     $sql="select * from referee limit 7";
     $row=$link ->query($sql);
     $a="";
     while($s = mysqli_fetch_assoc($row)){
     $a.='
        <div class="midbox">
        <div>'.$s['rno'].'</div>
        <div>'.$s['name'].'</div>
        <div>'.$s['mima'].'</div>
        <div><a href="cp_data.html?rno='.$s['rno'].'">修改</a></div>
        <div><a href="cp_delete.html?rno='.$s['rno'].'">删除</a></div>
      </div>
      ';
     }

     $sql="select * from referee ";
     $row=$link ->query($sql);
     $a.='@'.ceil(mysqli_num_rows($row)/7);
     return $a;
}

function cp_2($link,$m){
    $t=($m-1)*7;
    $sql="select * from referee limit $t,7";
    $row=$link ->query($sql);
    $a="";
    while($s = mysqli_fetch_assoc($row)){
    $a.='
       <div class="midbox">
       <div>'.$s['rno'].'</div>
       <div>'.$s['name'].'</div>
       <div>'.$s['mima'].'</div>
       <div><a href="cp_data.html?rno='.$s['rno'].'">修改</a></div>
       <div><a href="cp_delete.html?rno='.$s['rno'].'">删除</a></div>
     </div>
     ';
    }
    $a.='@'.$m;
    return $a;
}

if($n==1){
    echo cp_1($link);
}
else if($n==2){
    $m=$_GET['m'];
    echo cp_2($link,$m);
}
?>