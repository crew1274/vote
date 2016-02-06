<?php
	require '../includes/comm.inc.php';

	isAccess();

	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在提交的id对应的留言
		mysqlQuery("SELECT `vt_id` FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");
		if(mysql_affected_rows() == 0){
			alertBack('没有該留言建議!');
		}

		//删除id对应的留言建议
		mysqlQuery("DELETE FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");

		if(mysql_affected_rows() == 1){
			mysql_close($conn);
			alertLocation('刪除留言建議成功!', 'guest_manager.php');
		}else{
			mysql_close($conn);
			alertBack('刪除留言建議失敗!');
		}
	}else{
		alertBack('非法參數!');
	}

?>
