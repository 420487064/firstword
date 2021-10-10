<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function player_data_1($link,$m){
     $sql="select * from college where cno='$m'";
     $row=$link ->query($sql);
     $s=mysqli_fetch_assoc($row);
     $a=$s['cno'].'@'.$s['cname'];
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo player_data_1($link,$m);
}

?>