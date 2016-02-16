<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 if(!empty($_POST['addtheme'])){
	 	$voteTheme = array();
	 	$voteTheme['title'] = mysql_real_escape_string($_POST['theme']);
	 	$voteTheme['admin'] = $_SESSION['admin'];

	 	mysqlQuery("INSERT INTO `vt_theme`(
											 	`vt_title`,
											 	`vt_admin`,
											 	`vt_time`
	 									  )
	 								VALUES(
											 	'{$voteTheme['title']}',
											 	'{$voteTheme['admin']}',
											 	localtime())
									 	");
		$max=mysqlFetchArray("SELECT * FROM vt_theme, (SELECT MAX(vt_id) AS max_alias FROM vt_theme) as anotheralias  WHERE vt_id=max_alias");
		$max['vt_id']++;
		mysqlQuery("CREATE TABLE `vt_vote`.`vt_theme_{$max['vt_id']}` ( `ai` INT NOT NULL AUTO_INCREMENT , `student_id` VARCHAR(11) NOT NULL , `student_vote_id` INT(4) NOT NULL , `student_interview` TINYINT(2) NOT NULL , `ip` VARCHAR(20) NOT NULL , `vote_time` DATE NOT NULL , PRIMARY KEY (`ai`)) ");

	/* 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);*/
	 		alertLocation('添加主題成功!', 'vote_manager.php');
	 /*	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加主題失敗!');
	 	}*/
	 }
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/add_vote_theme.css" />
	<script type="text/javascript" src="js/add_vote_theme.js"></script>
	<link rel="shortcut icon" href="../images/favico.ico"/>
	<link rel="bookmark" href="../images/favico.ico"/>
	<title>不可錯過的10門課票選</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			<img src="../images/logo.jpg">
		</div>
		<?php
			include 'includes/adminnav.inc.php';
		?>
		<div id="main">
			<?php
				include 'includes/maintop.inc.php';
			?>
			<div id="add-theme">
				<form action="" method="post">
					<label>請輸入投票主題:<input type="text" name="theme" value="" class="add"/></label><br>
					<label>請選擇投票主題開始時間:<input type="text" name="theme" value="" class="add"/></label><br>
					<label>請選擇投票主題結束時間:<input type="text" name="theme" value="" class="add"/></label><br>
					<input type="submit" name="addtheme" value="添加主題" />&nbsp;&nbsp;<a href="javascript:;" onclick="history.back();">返回</a>
				</form>
			</div>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
