<?php
	 require '../includes/comm.inc.php';

	isAccess();


?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>後台管理--首頁</title>
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
			<div id="main-bottom">
				<p>這是一個投票管理系统後台</p>
				<p>可以在這裡</p>
				<ul>
					<li>添加投票主題</li>
					<li>添加投票選項</li>
					<li>刪除投票主題</li>
					<li>管理留言紀錄</li>
					<li>添加系统公告</li>
				</ul>

			</div>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
