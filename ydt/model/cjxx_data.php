<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function cjxx_item($link){
       $sql="select * from  item order by ino";
       $row=$link ->query($sql);;
       $a='<option>< --     请先选择   -- ></option>';
       while($s = mysqli_fetch_assoc($row)){
        $a.='<option>'.$s['ino'].'</option>';
       };

       return $a;
}

function cjxx_bh($link,$m){
    $sql="select * from item where ino=$m";
    $row=$link ->query($sql);
    $s =mysqli_fetch_assoc($row);
    $a='类型 : '.$s['itype'].'@名称 : '.$s['iname'].'@';

    $sql="select * from jion where ino='$m' order by pno desc";
    $row=$link ->query($sql);
    $a.='<option>< --        请选择   -- ></option>';
    while($s = mysqli_fetch_assoc($row)){
        $a.='<option>'.$s['pno'].'</option>';
       };
   return $a;
}

function cjxx_ydy($link,$m){
    $sql="select * from player,college where player.pno='$m' and  college.cno=player.cno ";
    $row=$link ->query($sql);
    $s =mysqli_fetch_assoc($row);
    $a='学院 : '.$s['cname'].'@学号 : '.$s['pid'].'@姓名 : '.$s['pname'];
    return $a;
}

function cjxx_4($link,$pno,$ino){
    $sql="select * from  item order by ino";
    $row=$link ->query($sql);
    $a='<option>'.$ino.'</option>';
    while($s = mysqli_fetch_assoc($row)){
     if($s['ino']!=$ino)$a.='<option>'.$s['ino'].'</option>';
    };

    $sql="select * from  item where ino='$ino'";
    $row=$link ->query($sql);
    $s = mysqli_fetch_assoc($row);
    $a.='@类型 : '.$s['itype'].'@名称 : '.$s['iname'].'@';
    
    $sql="select * from jion where ino='$ino' order by pno desc";
    $row=$link ->query($sql);
    $a.='<option>'.$pno.'</option>';
    while($s = mysqli_fetch_assoc($row)){
        if($s['pno']!=$pno) $a.='<option>'.$s['pno'].'</option>';
       };

       $sql="select * from player,college where player.pno='$pno' and  college.cno=player.cno ";
       $row=$link ->query($sql);
       $s =mysqli_fetch_assoc($row);
       $a.='@学院 : '.$s['cname'].'@学号 : '.$s['pid'].'@姓名 : '.$s['pname'];
     
       $sql="select * from grade where ino='$ino' and pno='$pno'";
       $row=$link ->query($sql);  
       $s = mysqli_fetch_assoc($row);
       $a.='@'.$s['grade'];

   return $a;
}
if($n==1){
    echo cjxx_item($link);
}
else if($n==2){
   $m=$_GET['m'];
   echo cjxx_bh($link,$m);
}
else if($n==3){
    $m=$_GET['m'];
    echo cjxx_ydy($link,$m);
 }
 else if($n==4){
    $ino=$_GET['ino'];
    $pno=$_GET['pno'];
    echo cjxx_4($link,$pno,$ino);
 }
?>