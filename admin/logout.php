<?php
	 require '../includes/comm.inc.php';
	 setcookie('adminid','',time()-1);
	 session_destroy();
	 alertLocation('登出成功!', '../index.php');
?>
