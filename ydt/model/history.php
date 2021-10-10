<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function a($link){
  
    $sql="select * from item order by ino limit 6";
    $row=mysqli_query($link,$sql);
    $a="";
    while($s=mysqli_fetch_assoc($row)){
         $a.='
         <div class="midbox"> 
        <div>'.$s['iname'].'</div>
        <div>'.$s['yrecord'].'</div>
        </div>
         ';
    }
    $sql="select * from item order by ino ";
    $row=mysqli_query($link,$sql);
    $num=ceil(mysqli_num_rows($row)/6);
    $a.='@'.$num;
    echo $a;
}

function b($link,$y){

    $y=($y-1)*6;
    $sql="select * from item order by ino limit $y,6";
    $row=mysqli_query($link,$sql);
    $a="";
    while($s=mysqli_fetch_assoc($row)){
         $a.='
         <div class="midbox"> 
        <div>'.$s['iname'].'</div>
        <div>'.$s['yrecord'].'</div>
        </div>
         ';
    }
    echo $a;

}

if($n==1){
    echo a($link);
}
else if($n==2){
    $y=$_GET['y'];
    echo b($link,$y);
}


?>