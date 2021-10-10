<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function player_data_1($link,$m){
     $sql="select * from item where ino='$m'";
     $row=$link ->query($sql);
     $s=mysqli_fetch_assoc($row);
     $a=$s['ino'].'@'.$s['itype'].'@'.$s['iname'].'@'.date('Y-m-d h:s',$s['itime']).'@'.$s['place'].'@'.$s['yrecord'].'@';
     $a.='<option>'.$s['day'].'</option>';
     
     $b=$s['day'];
     $c=$s['rno'];
     $sql="select * from date";
     $row=$link ->query($sql);
    while($s=mysqli_fetch_assoc($row)){
        if($s['day']!=$b)$a.='<option>'.$s['day'].'</option>';
    }
     

    $a.='@<option>'.$c.'</option>';
     $sql="select * from referee";
     $row=$link ->query($sql);
    while($s=mysqli_fetch_assoc($row)){
        if($s['rno']!=$c)$a.='<option>'.$s['rno'].'</option>';
    }

     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo player_data_1($link,$m);
}

?>