<?php
	 require 'includes/comm.inc.php';

	  $authentication = $_GET["authentication"];
    $student_id=decrypt($authentication, 50150);
		$rs = mysqlFetchArray("SELECT * FROM `vt_student` WHERE `student_id` ='{$student_id}' ");
		if($rs == NULL)
		{
			alertLocation('請檢查網址是否錯誤!如有問題請連絡我們。', 'index.php');
		}
		if($rs['token'] == 1)
		{
			alertLocation('此學號已驗證過!', 'index.php');
		}
	 	mysqlQuery("UPDATE `vt_student` SET `token`='1' WHERE `student_id`='{$student_id}'");

	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
			$_SESSION['student_id']= $rs['student_id'];
			$_SESSION['student_name']= $rs['student_name'];
 			setcookie('student_id',$rs['student_id']);
	 		alertLocation('驗證成功!即將自動導向首頁!', 'index.php');
	 	}
		else
		{
	 		mysql_close($conn);
	 		alertLocation('驗證失敗!如有問題請連絡我們。', 'index.php');
	 	}
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />

<title>投票系統驗證</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			<img src="images/logo.jpg">
		</div>
		<?php
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
				<p>你現在登入的Ip是<span class="blue"><?php echo'<b>'. $_SERVER['REMOTE_ADDR'].'</b>'; ?></span>,現在時間是:<span class="blue"><b id=timer></b></span></p>
			</div>
			<div id="addguest">
					<dl>
					</dl>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
