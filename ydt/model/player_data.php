<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function player_data_1($link,$m){
     $sql="select * from player where pno='$m'";
     $row=$link ->query($sql);
     $s=mysqli_fetch_assoc($row);
     $a=$s['pno'].'@'.$s['pid'].'@'.$s['pname'].'@'.$s['psex'].'@'.$s['sdept'].'@'.$s['mima'].'@<option>'.$s['cno'].'</option>';
     $b=$s['cno'];
     $sql="select * from college";
     $row=$link ->query($sql);
    while($s=mysqli_fetch_assoc($row)){
        if($s['cno']!=$b)$a.='<option>'.$s['cno'].'</option>';
    }
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo player_data_1($link,$m);
}

?>