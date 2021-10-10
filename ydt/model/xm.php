<?php require '../Connections/connect.php'; ?>
<?php
$n = $_GET['n'];

function player_1($link)
{
    $sql = "select * from item order by ino limit 7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
        <div class="midbox">
        <div>' . $s['ino'] . '</div>
        <div>' . $s['itype'] . '</div>
        <div>' . $s['iname'] . '</div>
              <div>' . date("m-d H:s", strtotime($s['itime'])) . '</div>
        <div>' . $s['place'] . '</div>
        <div>' . $s['yrecord'] . '</div> 
              <div>' . $s['rno'] . '</div>
        <div><a href="xm_data.html?ino=' . $s['ino'] . '">修改</a></div>
        <div><a href="xm_delete.html?ino=' . $s['ino'] . '">删除</a></div>

       </div>
      ';
    }

    $sql = "select * from item";
    $row = $link->query($sql);
    $a .= '@' . ceil(mysqli_num_rows($row) / 7);
    return $a;
}

function player_2($link, $m)
{
    $t = ($m - 1) * 7;
    $sql = "select * from item order by ino limit $t,7";
    $row = $link->query($sql);
    $a = "";
    while ($s = mysqli_fetch_assoc($row)) {
        $a .= '
        <div class="midbox">
        <div>' . $s['ino'] . '</div>
        <div>' . $s['itype'] . '</div>
        <div>' . $s['iname'] . '</div>
              <div>' . date("m-d h:i", strtotime($s['itime'])) . '</div>
        <div>' . $s['place'] . '</div>
        <div>' . $s['yrecord'] . '</div> 
              <div>' . $s['rno'] . '</div>
        <div><a href="xm_data.html?ino=' . $s['ino'] . '">修改</a></div>
        <div><a href="xm_delete.html?ino=' . $s['ino'] . '">删除</a></div>

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