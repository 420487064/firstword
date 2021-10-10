<?php require '../Connections/connect.php' ?>
<?php
session_start();
$sql1 = "SELECT * FROM date";
$a = "";
$row1 = mysqli_query($link, $sql1);
$row1_total = mysqli_num_rows($row1);
$a .= $row1_total . '@';
while ($s = mysqli_fetch_assoc($row1)) {
	$a .= '<div class="h" index-data="'.$s['day'].'" >' . $s['time'] . '</div>';
}
$a .= '@';

$sql2 = "SELECT * FROM item where day='1' order by itime";
$row2 = $link->query($sql2);
$row2_total = mysqli_num_rows($row2);
$a .= $row2_total . '@';
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



$a .= '@';

$sql3 = "SELECT * FROM item";
$row3 = mysqli_query($link, $sql3);
$arr3 = array();
while ($s = mysqli_fetch_assoc($row3)) {
	$sqlt = $s['ino'];
	$sql3_1 = "SELECT * FROM grade where ino=$sqlt order by grade limit 3";
	$Recordset2 = mysqli_query($link, $sql3_1);
	$ans = 3;
	while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)) {
		$id = $row_Recordset2['pno'];
		$sql3_2 = "SELECT * FROM player where pno='$id'";
		$Recordset3 = mysqli_query($link, $sql3_2);
		$re = mysqli_fetch_assoc($Recordset3);
		$arr[$re['cno']]['num'] += $ans;
		$arr[$re['cno']][$ans]++;
		$ans--;
	}
}

$sql4 = "SELECT * FROM college ";
$row4 = mysqli_query($link, $sql4);
$total_row4 = mysqli_num_rows($row4);
$arr4 = array();
while ($row_Recordset4 = mysqli_fetch_assoc($row4)) {
	if (!$arr[$row_Recordset4['cno']]['num']) $arr[$row_Recordset4['cno']]['num'] = 0;
	if (!$arr[$row_Recordset4['cno']][1]) $arr[$row_Recordset4['cno']][1] = 0;
	if (!$arr[$row_Recordset4['cno']][2]) $arr[$row_Recordset4['cno']][2] = 0;
	if (!$arr[$row_Recordset4['cno']][3]) $arr[$row_Recordset4['cno']][3] = 0;
	$arr[$row_Recordset4['cno']]['name'] = $row_Recordset4['cname'];
}

$last_names = array_column($arr, 'num');
array_multisort($last_names, SORT_DESC, $arr);

//$a.=print_r($arr);

$sql5 = "SELECT * FROM college";
$row5 = mysqli_query($link, $sql5);
$q=0;
while ($s = mysqli_fetch_assoc($row5)) {
$a.=	'
<li>
<a>
  <span class="sp1">
	<span class="spp1">'.($q+1).'</span>
	<span class="spp2">'.$arr[$q]['name'].'</span>
  </span>
  <span class="sp2">'.$arr[$q]['3'].'</span>
  <span class="sp3">'.$arr[$q]['2'].'</span>
  <span class="sp4">'.$arr[$q]['1'].'</span>
  <span class="sp5">'.$arr[$q]['num'].'</span>
</a>
</li>
';
$q++;
}
$a.='@';

$sql6="select * from item";
$row6=$link ->query($sql6);
while($s=mysqli_fetch_assoc($row6)){
       $a.='<div class="bd" ';
	   if($s['itype']=="田赛")$a.='itype="'.(1).'"';
	   else $a.='itype="'.(2).'"';
	   $a.='index-data="'.$s['ino'].'">'.$s['iname'].'</div>';
}

$a.='@'.$_SESSION['id'];


echo $a;
?>