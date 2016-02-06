<?php
?>
<div id="main-top">
	<p>Welcome(管理員:<span class="blue"><?php echo $_SESSION['user']; ?></span>&nbsp;&nbsp;Ip:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),現在時間是:<span class="blue"><?php echo date('Y/m/d-H:i:s',time()); ?></span></p>
</div>
