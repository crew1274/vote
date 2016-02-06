<?php
	require '../includes/comm.inc.php';
	if(!empty($_POST['login'])){
		$loginInfo = array();
		$loginInfo['user'] = checkUser($_POST['user'],2,20);
		$loginInfo['pass'] = checkPass($_POST['pass'],2,20);
		$result = mysqlFetchArray("SELECT * FROM`vt_admin`
		                                WHERE`vt_admin_user`='{$loginInfo['user']}'
											              AND `vt_admin_pass`='{$loginInfo['pass']}'
										  LIMIT 1 ");

		if(mysql_affected_rows() == 1){
			$_SESSION['user']= $result['vt_name'];
			setcookie('adminid',$rs['vt_id']);
			mysql_close($conn);
			alertLocation('將以'.$_SESSION['user'].'身分登入!', 'index.php');
		}elseif(mysql_affected_rows() == 0){
			mysql_close($conn);
			alertBack('帳號密碼錯誤');

		}
	}

?>
<!DOCTYPE >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<title>Admin</title>
</head>
<body>
	<div id="login">
		<form action="" method="post">
			<dl>
				<dt>Admin login</dt>
				<dd><label>Account:<input type="text" name="user" /></label></dd>
				<dd><label>Password:<input type="password" name="pass" /></label></dd>
				<dd class="subbtm"><input type="submit" name="login" value="Login" />&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></dd>
			</dl>
		</form>
	</div>
</body>
</html>
