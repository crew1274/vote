<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 if(isset($_GET['page'])){	//为$_GET['page']做判断,
	 	$page = $_GET['page'];
	 	if(empty($page) || $page<0 || !is_numeric($page)){	//进行容错
	 		$page = 1;
	 	}else{
	 		$page = intval($_GET['page']);
	 	}
	 }else{
	 	$page = 1;
	 }
	 $pagelimit = 10;	//每分页显示10条数据

	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_guest`");
	 $counter = mysql_num_rows($query);		//总记录条数

	 if($counter == 0){
	 	$pagenum = 1;	//如果没有数据,默认第一页
	 }else{
	 	$pagenum = ceil($counter/$pagelimit);		//总页数
	 }

	 if($page > $pagenum){	//如果$_GET['page']传递的参数的值大于总页数,用总页数覆盖$_GET['page']传递的值
	 	$page = $pagenum;
	 }
	 $pag = ($page-1)*$pagelimit;

	 $query = mysqlQuery("SELECT
							 		`vt_id`,
							 		`vt_title`,
							 		`vt_content`,
							 		`vt_time`
						    FROM
							 		`vt_guest`
						ORDER BY
							 		`vt_time`
							DESC
							LIMIT   $pag,$pagelimit
						");

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guest-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>後台管理--留言管理</title>
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
			<div id="guest-manager">
				<center>留言建議管理中心</center>
				<!-- <h4><a href="add_notice.php">添加系统公告</a></h4> -->
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>留言標題</th>
							<th>留言内容</th>
							<th>留言時間</th>
							<th>操作</th>
						</tr>
						<?php
							if(mysql_affected_rows() == 0){
						?>
						<tr>
							<td colspan="4">暫時没有留言建議!</td>
						</tr>
						<?php
							}else{
								while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_content']; ?></td>
							<td><?php echo $rs['vt_time']; ?></td>
							<td><a href="del_guest.php?id=<?php echo $rs['vt_id']; ?>" name="delguest">刪除</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
			<?php
				pageListText('guest_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
