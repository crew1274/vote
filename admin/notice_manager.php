<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 if(isset($_GET['page'])){
	 	$page = $_GET['page'];
	 	if(empty($page) || $page<0 || !is_numeric($page)){
	 		$page = 1;
	 	}else{
	 		$page = intval($_GET['page']);
	 	}
	 }else{
	 	$page = 1;
	 }
	 $pagelimit = 10;

	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_notice`");
	 $counter = mysql_num_rows($query);

	 if($counter == 0){
	 	$pagenum = 1;
	 }else{
	 	$pagenum = ceil($counter/$pagelimit);
	 }

	 if($page > $pagenum){
	 	$page = $pagenum;
	 }
	 $pag = ($page-1)*$pagelimit;

	 //$sql = "select `tc_id`,`tc_username`,`tc_sex`,`tc_face` from `tc_user` order by tc_reg_time desc limit $pag,$pagelimit";
	 //$query = mysql_query($sql);
	 $query = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_admin`,`vt_content` FROM `vt_notice` ORDER BY `vt_time` DESC LIMIT $pag,$pagelimit");

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/notice-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
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
			<div id="notice-manager">
				<center>系统公告管理中心</center>
				<h4><a href="add_notice.php">增加系统公告</a></h4>
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>公告主题</th>
							<th>公告内容</th>
							<th>發布人</th>
							<th>操作</th>
						</tr>
						<?php
							if(mysql_affected_rows() == 0){
						?>
						<tr>
							<td colspan="4">暫時没有公告,請增加公告!</td>
						</tr>
						<?php
							}else{
								while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_content']; ?></td>
							<td><?php echo $rs['vt_admin']; ?></td>
							<td><a href="del_notice.php?id=<?php echo $rs['vt_id']; ?>" name="delnotice">刪除</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
			<?php
				pageListText('notice_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
