<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', '');
	define('DB_PASS', '');
	define('DB_NAME', '');
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('資料庫連接失敗!');
	mysql_select_db(DB_NAME) or die('資料庫不存在!');
	mysql_query("SET NAMES UTF8");
?>
