<?php
	require '../includes/comm.inc.php';

	isAccess();

	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在提交的id对应的公告
		mysqlQuery("SELECT `vt_id` FROM `vt_notice` WHERE `vt_id`='{$_GET['id']}'");
		if(mysql_affected_rows() == 0){
			alertBack('没有該系統公告!');
		}

		//删除id对应的系统公告
		mysqlQuery("DELETE FROM `vt_notice` WHERE `vt_id`='{$_GET['id']}'");

		if(mysql_affected_rows() == 1){
			mysql_close($conn);
			alertLocation('刪除系統公告成功!', 'notice_manager.php');
		}else{
			mysql_close($conn);
			alertBack('刪除系統公告失敗!');
		}
	}else{
		alertBack('非法參數!');
	}

?>
