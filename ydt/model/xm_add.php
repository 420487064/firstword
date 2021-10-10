<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function xm_add_1($link,$m){


     $sql="select * from referee";
     $row=$link ->query($sql);
     $a="";
     while( $s=mysqli_fetch_assoc($row)){
     $a.='
       <option>'.$s['rno'].'</option>
     ';
     }

     $sql="select * from date";
  $row=$link ->query($sql);
  $a.="@";
  while( $s=mysqli_fetch_assoc($row)){
  $a.='
    <option>'.$s['day'].'</option>
  ';
    }
     return $a;
} 

if($n==1){
    $m=$_GET['m'];
    echo xm_add_1($link,$m);
}

?>