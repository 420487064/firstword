<?php require '../Connections/connect.php'; ?>
<?php
$n = $_GET['n'];

function player_1($link)
{
    $sql = "select * from player,college where college.cno=player.cno limit 7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
     <div class="midbox">
     <div>'.$s['pno'].'</div>
     <div>'.$s['pid'].'</div>
     <div>'.$s['pname'].'</div>
     <div>'.$s['psex'].'</div>
     <div>'.$s['sdept'].'</div>
     <div>'.$s['mima'].'</div>
     <div>'.$s['cno'].'</div>
     <div><a href="player_data.html?pno='.$s['pno'].'">修改</a></div>
     <div><a href="player_del.html?pno='.$s['pno'].'">删除</a></div>
     </div>   
    </div>
      ';
    }

    $sql = "select * from player";
    $row = $link->query($sql);
    $a .= '@' . ceil(mysqli_num_rows($row) / 7);
    return $a;
}

function player_2($link, $m)
{
    $t = ($m - 1) * 7;
    $sql = "select * from player,college where college.cno=player.cno limit $t,7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
        <div class="midbox">
        <div>'.$s['pno'].'</div>
        <div>'.$s['pid'].'</div>
        <div>'.$s['pname'].'</div>
        <div>'.$s['psex'].'</div>
        <div>'.$s['sdept'].'</div>
        <div>'.$s['mima'].'</div>
        <div>'.$s['cno'].'</div>
        <div><a href="player_data.html?pno='.$s['pno'].'">修改</a></div>
        <div><a href="player_del.html?pno='.$s['pno'].'">删除</a></div>
        </div>   
       </div>
     ';
    }
    $a .= '@' . $m;
    return $a;
}

if ($n == 1) {
    echo player_1($link);
} else if ($n == 2) {
    $m = $_GET['m'];
    echo player_2($link, $m);
}
?>