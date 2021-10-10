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
          <a href="../owe/owegrade.html">
            <div class="tcc">个人成绩</div>
          </a>
          <a href="../owe/mima_data.html">
            <div class="tcc">修改密码</div>
          </a>
          ';
        } else if ($qx == 2) {
            return '
            <a href="../cp/cp.html">
            <div class="tcc">裁判信息</div>
          </a>
         
          <a href="../bm/bm.html">
            <div class="tcc">报名表信息</div>
          </a>
          <a href="../cjxx/cjxx.html">
            <div class="tcc">成绩信息</div>
          </a>
         <a href="../player/player.html">
           <div class="tcc">运动员信息</div>
         </a>
          <a href="../owe/mima_data.html">
            <div class="tcc">修改密码</div>
          </a>

          <a href="../xy/xy.html">
          <div class="tcc">学院信息</div>
        </a>
        <a href="../xm/xm.html">
        <div class="tcc">项目信息</div>
      </a>
          ';
        } else if ($qx == 3) {
            return '
          <a href="../bm/bm.html">
            <div class="tcc">报名表信息</div>
          </a>
          <a href="../cjxx/cjxx.html">
            <div class="tcc">成绩信息</div>
          </a>

          <a href="../owe/mima_data.html">
            <div class="tcc">修改密码</div>
          </a>
          ';
        }
    }
}


if ($n == 1) {
    $qx = $_SESSION['qx'];
    echo a($id, $qx);
}

?>