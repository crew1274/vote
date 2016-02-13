<?php
	 require 'includes/comm.inc.php';

	 //添加留言
	 if(!empty($_POST['guest'])){
	 	$guestInfo = array();
	 	$guestInfo['title'] = mysql_real_escape_string(chkNtitle($_POST['title'],2,50));
	 	$guestInfo['content'] = mysql_real_escape_string(chkNcontent($_POST['content'],10,255));

	 	mysqlQuery("INSERT INTO `vt_guest`(`vt_title`,`vt_content`,`vt_ip`,`vt_time`) VALUES('{$guestInfo['title']}','{$guestInfo['content']}','{$_SERVER['REMOTE_ADDR']}',NOW())");

	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('留言成功!謝謝!', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('留言失败!');
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
				<p>你現在登入的Ip是<span class="blue"><?php echo'<b>'. $_SERVER['REMOTE_ADDR'].'</b>'; ?></span>,現在時間是:<span class="blue"><b id=timer></b></span></p>
			</div>
			<div id="addguest">
				<form action="" method="post" name="guestform">
					<dl>
						<dt>新增留言建議</dt>
						<dd><label>留言標題:<input type="text" name="title" class="title"/></label></dd>
						<dd><label>留言内容:<textarea name="content"></textarea></label></dd>
						<dd><input type="submit" name="guest" value="留言" /></dd>
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
