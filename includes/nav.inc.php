<?php
?>
<div id="nav">
	<ul>
		<li>
			<a href="index.php">首頁</a>
			<?php
				if(isset($_SESSION['user'])){
			?>
			<?php
				}
			?>
			<a href="signup.php">取得帳號</a>
			<?php
				if(!isset($_SESSION['user'])){
			?>
			<?php
				}
			?>
			<a href="guestbook.php">留言建議</a>
			<?php
				if(!isset($_SESSION['user'])){
			?>
			<?php
				}
			?>
		</li>
	</ul>
</div>
