<?php
mysqli_select_db( $connect,$database_connect);
$sql = "SELECT * FROM item";
$Recordset1 = mysqli_query($connect,$sql) ;

$arr=array();
while($row_Recordset1 = mysqli_fetch_assoc($Recordset1)){
	 $sqlt=$row_Recordset1['ino'];
     $sql2="SELECT * FROM grade where ino=$sqlt order by grade limit 3";
	 $Recordset2 = mysqli_query($connect,$sql2) ;
	 $ans=3;
     while($row_Recordset2 = mysqli_fetch_assoc($Recordset2)){		
		$id=$row_Recordset2['pno'];
	    $sql3="SELECT * FROM player where pno='$id'";
		$Recordset3 = mysqli_query($connect,$sql3) ;
		$re=mysqli_fetch_assoc($Recordset3);
		$arr[$re['cno']]+=$ans;
		$ans--;
	 }
}
arsort($arr);
print_r($arr);

$pageNum_Recordset1=($_GET['pageNum_Recordset1']?$_GET['pageNum_Recordset1']:0);
$sql4="SELECT * FROM college ";
$Recordset4 = mysqli_query($connect,$sql4) ;
$totalPages_Recordset1 = mysqli_num_rows($Recordset4);

$arr2=array();
while($row_Recordset4=mysqli_fetch_assoc($Recordset4)){
	if(!$arr[$row_Recordset4['cno']])$arr[$row_Recordset4['cno']]=0;
     $arr2[$row_Recordset4['cno']]=$row_Recordset4['cname'];
}

?>