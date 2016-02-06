<?php
	 require 'includes/comm.inc.php';

	 	$signupInfo = array();
	 	$signupInfo['student_id'] = mysql_real_escape_string(chkNtitle($_POST['student_id'],9,11));
	 	$signuptInfo['name'] = mysql_real_escape_string(chkNcontent($_POST['name'],2,30));
		$signuptInfo['password'] = mysql_real_escape_string(chkNcontent($_POST['password'],2,30));
		$signuptInfo['password_confrim'] = mysql_real_escape_string(chkNcontent($_POST['password_confrim'],2,30));
    if($signuptInfo['password']!= $signuptInfo['password_confrim'])
		{
			alertBack('密碼不相符合!');
		}
	 	mysqlQuery("INSERT INTO `vt_sign`(`studeent_id`,`studeent_name`,`studeent_password`) VALUES('{$signupInfo['studeent_id']}','{$signupInfo['name']}','{$_SERVER['REMOTE_ADDR']}',NOW())");

	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('註冊成功!請前往學校信箱收取驗證郵件。', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('註冊失敗!如有問題請連絡我們。');
	 	}
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />

<title>投票系统--註冊</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			Logo
		</div>
		<?php
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
				<p>你現在登入的Ip是<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>,現在時間是:<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
			</div>
			<div id="addguest">
				<form action="" method="post" name="guestform">
					<dl>
						<dt>限定本校學生註冊</dt>
						<dd><label>學號:<input type="text" name="student_id" class="student_id"/></label></dd>
						<dd><label>姓名:<input type="text" name="name" class="name"/></label></dd>
						<dd><label>密碼:<input type="password" name="password" class="password"/></label></dd>
						<dd><label>確認密碼:<input type="password" name="password_confrim" class="password"/></label></dd>
						<dd><input type="submit" name="submit" value="取得驗證信" /></dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">返回</a></dd>
					</dl>
				</form>
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
