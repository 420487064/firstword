<?php require '../Connections/connect.php'; ?>
<?php
$n=$_GET['n'];

function  a($link){
	
$a='';
$sql3 = "SELECT * FROM item";
$row3 = mysqli_query($link, $sql3);
$arr = array();
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

$sql5 = "SELECT * FROM college limit 6";
$row5 = mysqli_query($link, $sql5);
$q=0;
while ($s = mysqli_fetch_assoc($row5)) {
$a.=	'
<div class="midbox"> 
        <div>'.$arr[$q]['name'].'</div>
        <div>'.$arr[$q]['num'].'</div>
        </div>

';
//<li>
//<a>
//  <span class="sp1">
//	<span class="spp1">'.($q+1).'</span>
//	<span class="spp2">'.$arr[$q]['name'].'</span>
//  </span>
//  <span class="sp2">'.$arr[$q]['3'].'</span>
//  <span class="sp3">'.$arr[$q]['2'].'</span>
//  <span class="sp4">'.$arr[$q]['1'].'</span>
//  <span class="sp5">'.$arr[$q]['num'].'</span>
//</a>
//</li>
$q++;
}
$a.='@'.ceil($total_row4/6);
echo $a;

}

function  b($link,$y){
	
$a='';
$sql3 = "SELECT * FROM item";
$row3 = mysqli_query($link, $sql3);
$arr = array();
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
$t=($y-1)*6;
$sql5 = "SELECT * FROM college limit $t,6";
$row5 = mysqli_query($link, $sql5);
while ($s = mysqli_fetch_assoc($row5)) {
$a.=	'
<div class="midbox"> 
        <div>'.$arr[$t]['name'].'</div>
        <div>'.$arr[$t]['num'].'</div>
        </div>

';

//<li>
//<a>
//  <span class="sp1">
//	<span class="spp1">'.($q+1).'</span>
//	<span class="spp2">'.$arr[$q]['name'].'</span>
//  </span>
//  <span class="sp2">'.$arr[$q]['3'].'</span>
//  <span class="sp3">'.$arr[$q]['2'].'</span>
//  <span class="sp4">'.$arr[$q]['1'].'</span>
//  <span class="sp5">'.$arr[$q]['num'].'</span>
//</a>
//</li>
$t++;
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