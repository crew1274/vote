<?php
	 require 'includes/comm.inc.php';
    if(!empty($_POST['submit'])){
	 	$str = mysql_real_escape_string(chk($_POST['student_id'],9,14,'學號'));
		$student_id= strtoupper($str);
		$rs = mysqlFetchArray("SELECT * FROM `vt_student` WHERE `student_id` ='{$student_id}' ");
 	 	if($rs == NULL)
		{mysql_close($conn);
 	 	alertBack('無效學號!如有問題請連絡我們。');
 	 	}
	 	if(mysql_affected_rows() == 1){
      $password=sha1($rs['student_password']);
			forget_password_send_mail($student_id,$rs['student_name'],$password);
			mysql_close($conn);
	 		alertLocation('請前往學校信箱收取驗證郵件。', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('驗證錯誤!如有問題請連絡我們。');
	 	}
	}
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />
<link rel="shortcut icon" href="images/favico.ico"/>
<link rel="bookmark" href="images/favico.ico"/>
<title>不可錯過的10門課票選</title>
</head>
<body onload="timenow()" >
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
				<form action="" method="post" name="guestform">
					<dl>
						<dd><h5>請填寫學號，我們將會寄發信件到此信箱。</h5></dd>
						<dd><label>學號:<input type="text" name="student_id" class="student_id"/></label></dd>
						</form>
						<dd><input type="submit" name="submit" value="取得密碼驗證信" /></dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">返回</a></dd>
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
