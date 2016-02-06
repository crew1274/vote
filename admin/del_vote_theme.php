<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	//判断是否存在提交的id对应的主题
	 	mysqlQuery("SELECT `vt_id` FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");
	 	if(mysql_affected_rows() == 0){
	 		alertBack('没有該投票主題!');
	 	}

	 	//删除对应id的主题记录
	 	mysqlQuery("DELETE FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");

	 	if(mysql_affected_rows() == 1){
	 		//删除对应id的主题的所有选项记录
	 		mysqlQuery("DELETE FROM `vt_list` WHERE 'vt_vid'='{$_GET['id']}'");

	 		if(mysql_affected_rows() == 1){
	 			mysql_close($conn);
	 			alertLocation('刪除投票主題成功!', 'vote_manager.php');
	 		}elseif(mysql_affected_rows() == 0){
	 			mysql_close($conn);
	 			alertLocation('刪除主題選項失敗!', 'vote_manager.php');
	 		}
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('刪除投票主題失敗!');
	 	}
	 }else{
	 	alertBack('非法參數!');
	 }
?>
