<?php
	 require '/includes/comm.inc.php';
	 setcookie('student_id','',time()-1);
	 session_destroy();
	 alertLocation('登出成功!', 'index.php');
?>
