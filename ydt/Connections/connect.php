<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$link=mysqli_connect("p:localhost", "root", "root")or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_select_db($link,"yd");
mysqli_set_charset($link,"utf8");
error_reporting(0);

?>