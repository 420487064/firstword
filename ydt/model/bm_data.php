<?php require '../Connections/connect.php'; ?>
<?php
session_start();
$id = $_GET['id'];
$n = $_GET['n'];
$pno = $_GET['pno'];
$ino = $_GET['ino'];
$a = "";
switch ($n) {
	case 1:
		$sql = "SELECT * FROM player";
		$row = mysqli_query($link, $sql);
		$row_total = mysqli_num_rows($row);
		while ($s = mysqli_fetch_assoc($row)) {
			if($pno==$s['pno']){$a = '<option checked	="checked" value="' . $s['pno'] . '">' .$s['pno']. '</option>'.$a;}
			 else {$a .= '<option value="' . $s['pno'] . '">' . $s['pno'] . '</option>';}
		}

		$a .= '@';
		$sql1 = "SELECT * FROM item";
		$row1 = mysqli_query($link, $sql1);
		$row1_total = mysqli_num_rows($row1);
		$b="";
		while ($s = mysqli_fetch_assoc($row1)) {
			if($ino==$s['ino'])$b = '<option checked value="' . $s['ino'] . '">' . $s['ino'] . '</option>'.$b;
			else $b .= '<option value="' . $s['ino'] . '">' . $s['ino'] . '</option>';
		}

        $sql = "SELECT * FROM player where pno='$pno'";
		$row = mysqli_query($link, $sql);
		$s = mysqli_fetch_assoc($row);
		$sql1 = "SELECT * FROM college where cno='$s[cno]'";
		$row1 = mysqli_query($link, $sql1);
		$s1 = mysqli_fetch_assoc($row1);
		$c = '@学院 :' . $s1['cname'] . '@学号 :' . $s['pid'] . '@姓名 :' . $s['pname'];
      
		$sql = "SELECT * FROM item where ino='$ino'";
		$row = mysqli_query($link, $sql);
		$s = mysqli_fetch_assoc($row);
		$d = '@类型 :' . $s['itype'] . '@名称 :' . $s['iname'];

		echo $a.$b.$c.$d;
		break;


	case 2:
		$sql = "SELECT * FROM player where pno='$id'";
		$row = mysqli_query($link, $sql);
		$s = mysqli_fetch_assoc($row);
		$sql1 = "SELECT * FROM college where cno='$s[cno]'";
		$row1 = mysqli_query($link, $sql1);
		$s1 = mysqli_fetch_assoc($row1);
		$a = '学院 :' . $s1['cname'] . '@学号 :' . $s['pid'] . '@姓名 :' . $s['pname'];

		echo $a;
		break;

	case 3:
		$sql = "SELECT * FROM item where ino='$id'";
		$row = mysqli_query($link, $sql);
		$s = mysqli_fetch_assoc($row);
		$a = '类型 :' . $s['itype'] . '@名称 :' . $s['iname'];

		echo $a;
		break;
}

?> 
