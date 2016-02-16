<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 //添加系统公告
	 if(!empty($_POST['notice'])){
	 	$noticeInfo = array();
	 	$noticeInfo['title'] = mysql_real_escape_string(chkNtitle($_POST['ntitle'],2,50));
	 	$noticeInfo['content'] = mysql_real_escape_string(chkNcontent($_POST['ncontent'],10,255));

	 	mysqlQuery("INSERT INTO `vt_notice`(
											 	`vt_title`,
											 	`vt_content`,
											 	`vt_admin`,
											 	`vt_time`
											)
									VALUES(
											 	'{$noticeInfo['title']}',
											 	'{$noticeInfo['content']}',
											 	'{$_SESSION['admin']}',
											 	localtime()
											)
					");

	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('添加系統公告成功!', 'notice_manager.php');
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加系統公告失敗!');
	 	}
	 }
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/add-notice.css" />
<script type="text/javascript" src="js/index.js"></script>
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
			<div id="add-notice">
				<form action="" method="post" name="noticeform">
					<dl>
						<dt>添加系統公告</dt>
						<dd><label>公告標題:<input type="text" name="ntitle" class="title"/></label></dd>
						<dd><label>公告内容:<textarea name="ncontent"></textarea></label></dd>
						<dd><input type="submit" name="notice" value="添加公告" /></dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">返回</a></dd>
					</dl>
				</form>
			</div>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
