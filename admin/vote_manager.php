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
	 $pagelimit = 2;

	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_theme`");
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
	$query = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_admin`,`vt_time`,`vt_deadtime` FROM `vt_theme` ORDER BY `vt_time` DESC LIMIT $pag,$pagelimit");


?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/vote-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>後台管理--投票主題管理</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			Logo
		</div>
		<?php
			include 'includes/adminnav.inc.php';
		?>
		<div id="main">
			<?php
				include 'includes/maintop.inc.php';
			?>
			<div id="vote_manager">
				<center>投票主題管理中心</center>
				<h4><a href="add_vote_theme.php">添加投票主題</a>&nbsp;&nbsp;<a href="add_vote_list.php">添加投票選項</a></h4>
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>主题名稱</th>
							<th>發布人</th>
							<th>開始時間</th>
							<th>結束時間</th>
							<th>操作</th>
						</tr>
						<?php
							while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_admin']; ?></td>
							<td><?php echo $rs['vt_time']; ?></td>
							<td><?php echo $rs['vt_deadtime']; ?></td>
							<td><a href="del_vote_theme.php?id=<?php echo $rs['vt_id']; ?>" name="deltheme">刪除</a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<?php
				pageListText('vote_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
