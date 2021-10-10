<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function player_data_1($link,$m){
     $sql="select * from college ";
     $row=$link ->query($sql);
     $a="";
     while( $s=mysqli_fetch_assoc($row)){
     $a.='
       <option>'.$s['cno'].'</option>
     ';
     }
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo player_data_1($link,$m);
}

?>