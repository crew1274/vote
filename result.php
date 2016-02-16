<?php
	  require 'includes/comm.inc.php';
	  if(isset($_GET['id']) && !empty($_GET['id'])){
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
<link rel="shortcut icon" href="images/favico.ico"/>
<link rel="bookmark" href="images/favico.ico"/>
<title>不可錯過的10門課票選</title>
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
								<td class="list"><?php echo $rsList['vt_list']?></td>
								<td class="count"><?php echo $rsList['vt_count']; ?>票</td>
							</tr>
							<?php
								}
							?>
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
