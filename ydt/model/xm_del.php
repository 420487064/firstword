<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function player_data_1($link,$m){
     $sql="select * from item where ino='$m'";
     $row=$link ->query($sql);
     $s=mysqli_fetch_assoc($row);
     $a=$s['ino'].'@'.$s['itype'].'@'.$s['iname'].'@'.date('Y-m-d h:s',$s['itime']).'@'.$s['place'].'@'.$s['yrecord'].'@'.$s['rno'].'@'.$s['day'];
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo player_data_1($link,$m);
}

?>