<?php
	 require 'includes/comm.inc.php';
    if(!empty($_POST['submit'])){
	 	$signupInfo = array();
	 	$str = mysql_real_escape_string(chkNtitle($_POST['student_id'],9,11));
		$signupInfo['student_id']= strtoupper($str);
	 	$signupInfo['name'] = mysql_real_escape_string(chkNcontent($_POST['name'],2,30));
		$signupInfo['password'] = mysql_real_escape_string(chkNcontent($_POST['password'],2,40));
		$signuptInfo['password_confrim'] = mysql_real_escape_string(chkNcontent($_POST['password_confrim'],2,40));
		if($signupInfo['password'] != $signuptInfo['password_confrim'])
		{mysql_close($conn);
		alertBack('請確認密碼是否相符!');}
		$rs = mysqlFetchArray("SELECT `student_id` FROM `vt_student` WHERE `student_id` ='{$signupInfo['student_id']}' ");
 	 	if($rs != NULL)
		{mysql_close($conn);
 	 	alertBack('此學號已註冊過!');
 	 	}
	 	mysqlQuery("INSERT INTO `vt_student`(`student_id`,`student_name`,`student_password`,`signup_ip`,`signup_time`) VALUES('{$signupInfo['student_id']}','{$signupInfo['name']}','{$signupInfo['password']}','{$_SERVER['REMOTE_ADDR']}',NOW())");

	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
			$encrypt=encrypt($signupInfo['student_id'],50150);
			send_mail($signupInfo['student_id'],$signupInfo['name'],$signupInfo['password'],$encrypt);
	 		alertLocation('註冊成功!請前往學校信箱收取驗證郵件。', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('註冊失敗!如有問題請連絡我們。');
	 	}
	}
?>
<script type="text/javascript">
setInterval(function() {
    var currentTime = new Date ( );
		var currentYears = currentTime.getFullYear ( );
		var currentMonth = currentTime.getMonth ( );
		var currentDays = currentTime.getDate ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
    var currentTimeString = currentYears+"/"+currentMonth+"/"+currentDays+"  "+timeOfDay+" "+currentHours + ":" + currentMinutes + ":" + currentSeconds;
    document.getElementById("timer").innerHTML = currentTimeString;
}, 1000);
 </script>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />

<title>不可錯過的10門課票選</title>
</head>
<body onload="timenow()" >
	<div id="container">
		<div id="logo">
			Logo
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