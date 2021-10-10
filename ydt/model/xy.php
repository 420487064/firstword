<?php require '../Connections/connect.php'; ?>
<?php
$n = $_GET['n'];

function player_1($link)
{
    $sql = "select * from college order by cno limit 7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
        <div class="midbox">
            <div>'.$s['cno'].'</div>
            <div>'.$s['cname'].'</div>
            <div><a href="xy_data.html?cno='.$s['cno'].'">修改</a></div>
            <div><a href="xy_del.html?cno='.$s['cno'].'">删除</a></div>
           </div>
      ';
    }
    $sql = "select * from college";
    $row = $link->query($sql);
    $a .= '@' . ceil(mysqli_num_rows($row) / 7);
    return $a;
}

function player_2($link, $m)
{
    $t = ($m - 1) * 7;
    $sql = "select * from college order by cno limit $t,7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
        <div class="midbox">
        <div>'.$s['cno'].'</div>
        <div>'.$s['cname'].'</div>
        <div><a href="xy_data.html?cno='.$s['cno'].'">修改</a></div>
        <div><a href="xy_del.html?cno='.$s['cno'].'">删除</a></div>
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