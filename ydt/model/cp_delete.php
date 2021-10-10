<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function cp_data_1($link,$m){
     $sql="select * from referee where rno=$m";
     $row=$link ->query($sql);
     $s=mysqli_fetch_assoc($row);
     $a=$s['rno'].'@'.$s['name'].'@'.$s['mima'];
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo cp_data_1($link,$m);
}

?>