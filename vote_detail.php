<?php
	 require 'includes/comm.inc.php';
	   if(!isset($_SESSION['student_id']) || !isset($_SESSION['student_name']))
		 {
     alertLocation('請先登入帳號!', 'index.php');
		 }
     $result= mysqlFetchArray("SELECT * FROM `vt_student` WHERE `student_id`='{$_SESSION['student_id']}'");
		 if($result['token']!=1)
		 {
     alertLocation('請先收取信件驗證此學號!', 'index.php');
		 }
		 $result_1= mysqlFetchArray("SELECT * FROM `vt_theme_{$_GET['id']}` WHERE `student_id`='{$_SESSION['student_id']}'");
     if($result_1!= NULL)
		 {
			alertLocation('該主題你已投票過!', 'index.php');
		 }
	 //获取对应投票主题id的投票选项
	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	//判断是否存在该id对应的投票主题
	 	$rs = mysqlFetchArray("SELECT `vt_title` FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");
	 	if(mysql_affected_rows() == 0){
	 		alertLocation('不存在該投票主題!', 'index.php');
	 	}
	 	$queryList = mysqlQuery("SELECT
	 										`vt_id`,
								 			`vt_vid`,
								 			`vt_list`,
								 			`vt_count`
								 	FROM
								 			`vt_list`
								 WHERE
								 			`vt_vid`='{$_GET['id']}'
								 ORDER BY
								 			`vt_id`
								 	DESC
	 							");
	 }
	 //进行投票
	 if(!empty($_POST['vote'])){

	 	if(empty($_POST['list'])){
	 		alertBack('你没有選擇投票選項,請選擇!');
	 	}
	 	//同ip限時投票
	 	//$nowTime =
	 	$ipInfo = array();
	 	$ipInfo['title'] = mysql_real_escape_string($_POST['title']);
	 	$ipInfo['listid'] = mysql_real_escape_string($_POST['list']);
	 	$ipInfo['ip'] = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
	 	$ipInfo['themeid'] = $_POST['themeid'];
	 	mysqlQuery("INSERT INTO `vt_ip`(
										 	`vt_title`,
										 	`vt_listid`,
										 	`vt_ip`,
										 	`vt_time`
									   )
								 VALUES(
										 	'{$ipInfo['title']}',
										 	'{$ipInfo['listid']}',
										 	'{$ipInfo['ip']}',
										 	NOW()
									   )
				");

	 	if(mysql_affected_rows() == 1){
	 		//$id = mysql_insert_id();
	 		//$firstTime = time();
	 		mysqlQuery("UPDATE `vt_list` SET `vt_count`=`vt_count`+1 WHERE `vt_id`='{$ipInfo['listid']}'");
	 		//mysqlQuery("UPDATE `vt_ip` SET `vt_timelimit`='{$firstTime}' WHERE `vt_id`='{$id}'");
	 		mysql_close($conn);
	 		alertLocation('投票成功!', 'vote_detail.php?id='.$ipInfo['themeid']);
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('投票失敗!');
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
<link rel="stylesheet" type="text/css" href="styles/vote_detail.css" />
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
			<div id="vote-detail">
				<h4><?php echo $rs['vt_title'];?></h4>
				<form action="" method="post">
					<input type="hidden" name="title" value="<?php echo $rs['vt_title'];?>" />
					<input type="hidden" name="themeid" value="<?php echo $_GET['id'];?>" />
					<table cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<th>投票選項</th>
								<th class="count">投票结果</th>
							</tr>
							<?php
								while(!!$rsList = fetchArray($queryList)){
							?>
							<tr>
								<td class="list"><input type="radio" name="list" value="<?php echo $rsList['vt_id']?>" /><?php echo $rsList['vt_list']?></td>
								<td class="count"><?php echo $rsList['vt_count']; ?>票</td>
							</tr>
							<?php
								}
							?>
							<tr>
								<td class="subbtm" colspan="2"><input type="submit" name="vote" value="投票" /></td>
							</tr>
						</tbody>
					</table>
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
