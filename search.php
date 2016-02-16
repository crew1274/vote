<?php
	 require 'includes/comm.inc.php';

	 //获取搜索结果
	 if(!empty($_GET['search']) && !empty($_GET['keyword'])){
	 	$querySearch = mysqlQuery("SELECT
								 			`vt_id`,
								 			`vt_title`
								 	FROM
								 			`vt_theme`
								 	WHERE
								 			`vt_title`
								 	LIKE
								 			'%{$_GET['keyword']}%'
								 ORDER BY
								 			`vt_time`
								 	DESC
	 								");

	 }else{
	 	alertBack('非法參數!');
	 }

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/search-detail.css" />
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
			<div id="searchdetail">
				<h4>搜尋[ <span class="blue"><?php echo $_GET['keyword']; ?></span> ]的所有结果</h4>
				<ul>
					<?php
						if(mysql_affected_rows() == 0){
					?>
					<li>没有你要找的主題哦!請換個關鍵吧!</li>
					<?php
						}else{
							while(!!$rsSearch = fetchArray($querySearch)){
					?>
					<li><a href="vote_detail.php?id=<?php echo $rsSearch['vt_id']; ?>"><?php echo $rsSearch['vt_title'];?></a></li>
					<?php
							}
						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php
			//pageListText(, $lj, $pagenum, $page)
		?>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
