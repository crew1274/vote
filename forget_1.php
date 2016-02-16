<?php
	 require 'includes/comm.inc.php';
	  $student_id= $_GET["student"];
    $rs = mysqlFetchArray("SELECT * FROM `vt_student` WHERE `student_id` ='{$student_id}' ");
		if($rs== NULL)
			{
				mysql_close($conn);
				alertLocation('請檢查網址是否錯誤!', 'index.php');
			}
    $password=sha1($rs['student_password']);
    if(!empty($_POST['submit'])){
	 	$authentication = $_POST['authentication'];
		if($authentication != $password)
		{
			mysql_close($conn);
			alertBack('密碼驗證碼錯誤!');
		}
		$updateInfo['password'] = mysql_real_escape_string(chk($_POST['new_password'],2,40,'密碼'));
		$updateInfo['password_confrim'] = mysql_real_escape_string(chk($_POST['new_password_confrim'],2,40,'密碼'));
		if($updateInfo['password'] != $updateInfo['password_confrim'])
		{mysql_close($conn);
		alertBack('請確認密碼是否相符!');
	  }
	 mysqlQuery("UPDATE `vt_student` SET `student_password`='{$updateInfo['password']}' WHERE `student_id`='{$student_id}'");
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('密碼更新成功!', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('密碼更新失敗!如有問題請連絡我們。');
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
						<dd><h5>請填寫我們寄發信件到信箱的驗證碼</h5></dd>
						<dd><label>密碼驗證碼:<input type="text" name="authentication"/></label></dd>
						<dd><h5>請填寫你的新密碼</h5></dd>
						<dd><label>密碼:<input type="password" name="new_password"/></label></dd>
						<dd><label>確認密碼:<input type="password" name="new_password_confrim"/></label></dd>
						</form>
						<dd><input type="submit" name="submit" value="更新密碼" /></dd>
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
