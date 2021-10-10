<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$id = $_SESSION['id'];
$n = $_GET['n'];

function a($id, $qx)
{
    if ($id != "") {
        if ($qx == 1) {
            return '
    <li class="logo"><a id="tcdr">退出登入 </a></li>
          <li><a href="template/owe/owegrade.html">成绩查询</a></li>
          <li><a href="template/owe/mima_data.html">修改密码</a></li>
          ';
        } else if ($qx == 2) {
            return '
    <li class="logo"><a id="tcdr">退出登入 </a></li>
    <li><a href="template/xy/xy.html">学院信息</a></li>
          <li><a href="template/xm/xm.html">项目信息</a></li>
          <li><a href="template/player/player.html">运动员信息</a></li>
          <li><a href="template/bm/bm.html">报名信息</a></li>
          <li><a href="template/cjxx/cjxx.html">成绩信息</a></li>
          <li><a href="template/owe/mima_data.html">修改密码</a></li>
          <li><a href="template/cp/cp.html">裁判信息</a></li>
          ';
        } else if ($qx == 3) {
            return '
          <li class="logo"><a id="tcdr">退出登入 </a></li>
          <li><a href="template/cjxx/cjxx.html">成绩信息</a></li>
          <li><a href="template/bm/bm.html">报名信息</a></li>
          <li><a href="template/owe/mima_data.html">修改密码</a></li>
          ';
        }
    } else {
        return ' <li class="logo"><a href="template/next/dr.html">未登入</a></li>';
    }
}


if ($n == 1) {
    $qx = $_SESSION['qx'];
    echo a($id, $qx);
} else if ($n == 2) {
    unset($_SESSION['id']);
    echo '<li class="logo"><a href="template/next/dr.html">未登入</a></li>';
}

?>