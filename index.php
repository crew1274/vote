<?php
	 require 'includes/comm.inc.php';

	 //显示投票主题
	 //$queryTheme = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_time` FROM `vt_theme`");
	 $queryTheme = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_time` ,`vt_deadtime`FROM `vt_theme` ORDER BY `vt_deadtime` DESC");
	 $queryNotice = mysqlQuery("SELECT `vt_title`,`vt_content` FROM `vt_notice` ORDER BY `vt_id` DESC LIMIT 6");
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
<script type="text/javascript" src="js/index.js"></script>
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
			<div id="main-left">
				<dl id="gonggao">
					<dt>最新公告</dt>
					<marquee scrollamount="1" scrolldelay="40" direction="up" width="200" height="140" onMouseOver="this.stop()" onMouseOut="this.start()">
					<?php
						while(!!$rsNotice = fetchArray($queryNotice)){
					?>
					<dd><a href="javascript:;" title="<?php echo $rsNotice['vt_content'];?>"><?php echo mb_substr($rsNotice['vt_title'], 0,12,'utf-8').'...';?></a></dd>
					<?php
						}
					?>
					</marquee>
				</dl>
				<dl id="contact">
					<dt>聯絡我們</dt>
					<dd>國立成功大學課務組</dd>
					<dd>Tel:06-2757575#50156</dd>
					<dd>Mail:50156gm@gmail.com</dd>
				</dl>
			</div>
			<div id="main-mid">
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th class="voteid">編號</th>
							<th class="votetitle">投票主题</th>
							<th class="votetime">開始時間</th>
							<th class="votetime">截止時間</th>
							<th class="votetime">目前狀態</th></th>
						</tr>
						<?php
							while(!!$rsTheme = fetchArray($queryTheme)){
						?>
						<tr>
							<td class="voteid"><?php echo '#'.$rsTheme['vt_id']; ?></td>
							<td class="votetitle"><?php echo mb_substr($rsTheme['vt_title'], 0,18,'UTF-8'); ?></a></td>
							<td class="votetime"><?php $str = explode(' ',$rsTheme['vt_time']); echo $str[0];?></td>
							<td class="votetime"><?php $str = explode(' ',$rsTheme['vt_deadtime']); echo $str[0];?></td>
							<td class="voters">
               <?php

								echo '<a href="vote_detail.php?id='.$rsTheme['vt_id'].'">前往投票</a>';
								?>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<div id="main-right">
				<form action="search.php" method="get" name="searchform">
					<dl id="search">
						<dt>搜尋主題</dt>
						<dd><input type="text" name="keyword" value="搜尋主題" class="keyword"/></dd>
						<dd><input type="submit" name="search" value="搜尋" class="sub"/></dd>
					</dl>
				</form>
				<dl id="down">
					<dt>公告提示</dt>
					<dd>
          5j/4ul4l4knr40
					</dd>
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
