<?php require '../Connections/connect.php' ?>
<?php 
session_start();

$submit_zh = $_POST["zh"]; 
$submit_mm = $_POST["mm"]; 

$sql1="SELECT * FROM player where pid='$submit_zh' and mima='$submit_mm'";
$sql2="SELECT * FROM admin where ano='$submit_zh' and mima='$submit_mm'";
$sql3="SELECT * FROM referee where rno='$submit_zh' and mima='$submit_mm'";
$row1=mysqli_query($link,$sql1);
$row_total1=mysqli_num_rows($row1);
$row2=mysqli_query($link,$sql2);
$row_total2=mysqli_num_rows($row2);
$row3=mysqli_query($link,$sql3);
$row_total3=mysqli_num_rows($row3);
if($row_total1==1){
    unset($_SESSION["my_vcode"]);
    $s=mysqli_fetch_assoc($row1);
    $_SESSION['id']=$s['pno'];
    $_SESSION['qx']=1;
    result(200,$row_total);
}else if($row_total2==1){
    unset($_SESSION["my_vcode"]);
    $s=mysqli_fetch_assoc($row2);
    $_SESSION['id']=$s['ano'];
    $_SESSION['qx']=2;
    result(200,$row_total);
}else if($row_total3==1){
    unset($_SESSION["my_vcode"]);
    $s=mysqli_fetch_assoc($row3);
    $_SESSION['id']=$s['rno'];
    $_SESSION['qx']=3;
    result(200,$row_total);
}else{
    result(501,$row_total);
}
function result($code,$desc){
    $json["code"] = $code;
    $json["desc"] = $desc;
    die(json_encode($json));
}
?>