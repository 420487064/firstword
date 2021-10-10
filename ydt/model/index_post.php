<?php require '../Connections/connect.php' ?>
<?php
session_start();
$n=$_GET['n'];


function a($link,$ino,$itype){
    if ($itype == 1) $sql = "SELECT * FROM grade,player where grade.ino='$ino' and grade.pno=player.pno order by grade.grade desc limit 3";
    else $sql = "SELECT * FROM grade,player where grade.ino='$ino' and grade.pno=player.pno order by grade.grade  limit 3";
    $row = mysqli_query($link, $sql);
    $a = "";
    $s = mysqli_fetch_assoc($row);
    $a .= '<div>' . $s['pname'] . '</div>';
    $s = mysqli_fetch_assoc($row);
    $a = '<div>' . $s['pname'] . '</div>' . $a;
    $s = mysqli_fetch_assoc($row);
    $a .= '<div>' . $s['pname'] . '</div>';
    echo $a;
    
}

function b($link,$day){
    $sql2 = "SELECT * FROM item where day='$day' order by itime";
    $row2 = $link->query($sql2);
    $row2_total = mysqli_num_rows($row2);
    $a = "";
    while ($s = mysqli_fetch_assoc($row2)) {
        $a .= '<div class="scrollct">
                      <a href="#">
                         <div class="scrollct_z">
                          <span></span>
                          <div class="scrollct_li"></div>
                          </div>
                          <div class="scrollct_time">' . date_format(date_create($s['itime']), "H:i") . '</div>
                          <div class="scrollct_start"></div>
                          <div class="scrollct_end">' . $s['iname'] . '(' . $s['place'] . ')</div>
                      </a>	 
                   </div> 
                   ';
    }
    return $a;
}


if($n==1){
    $ino = $_GET['ino'];
$itype = $_GET['itype'];
    echo a($link,$ino,$itype);
}
else if($n==2){
    $day=$_GET['day'];
    echo b($link,$day);
}
?>