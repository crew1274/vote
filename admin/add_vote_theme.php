<?php
	 require '../includes/comm.inc.php';

	 isAccess();

	 if(!empty($_POST['addtheme'])){
	 	$voteTheme = array();
	 	$voteTheme['title'] = mysql_real_escape_string($_POST['theme']);
	 	$voteTheme['admin'] = $_SESSION['admin'];
    $start_time_y=mysql_real_escape_string($_POST['start_time_y']);
		$start_time_m=mysql_real_escape_string($_POST['start_time_m']);
		$start_time_d=mysql_real_escape_string($_POST['start_time_d']);
		$start_time_h=mysql_real_escape_string($_POST['start_time_h']);
		$start_time_min=mysql_real_escape_string($_POST['start_time_min']);
		$start_time_sec=mysql_real_escape_string($_POST['start_time_sec']);
		$dead_time_y=mysql_real_escape_string($_POST['dead_time_y']);
		$dead_time_m=mysql_real_escape_string($_POST['dead_time_m']);
		$dead_time_d=mysql_real_escape_string($_POST['dead_time_d']);
		$dead_time_h=mysql_real_escape_string($_POST['dead_time_h']);
		$dead_time_min=mysql_real_escape_string($_POST['dead_time_min']);
		$dead_time_sec=mysql_real_escape_string($_POST['dead_time_sec']);
	 	mysqlQuery("INSERT INTO `vt_theme`(
											 	`vt_title`,
											 	`vt_admin`,
											 	`vt_time`,
												`vt_deadtime`
	 									  )
	 								VALUES(
											 	'{$voteTheme['title']}',
											 	'{$voteTheme['admin']}',
												'{$start_time_y}-{$start_time_m}-{$start_time_d} {$start_time_h}:{$start_time_min}:{$start_time_sec}',
											 	/*'{$start_time_y}-{$start_time_m}-{$start_time_d} {$start_time_h}:{$start_time_min}:{$start_time_sec}',*/
											  '{$dead_time_y}-{$dead_time_m}-{$dead_time_d} {$dead_time_h}:{$dead_time_min}:{$dead_time_sec}')
									 	");
		$max=mysqlFetchArray("SELECT * FROM vt_theme, (SELECT MAX(vt_id) AS max_alias FROM vt_theme) as anotheralias  WHERE vt_id=max_alias");
		mysqlQuery("CREATE TABLE `vt_vote`.`vt_theme_{$max['vt_id']}` ( `ai` INT NOT NULL AUTO_INCREMENT , `student_id` VARCHAR(11) NOT NULL , `student_vote_id` INT(4) NOT NULL , `student_interview` TINYINT(2) NOT NULL , `ip` VARCHAR(20) NOT NULL , `vote_time` DATE NOT NULL , PRIMARY KEY (`ai`)) ");

	/* 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);*/
	 		alertLocation('添加主題成功!', 'vote_manager.php');
	 /*	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加主題失敗!');
	 	}*/
	 }
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/add_vote_theme.css" />
	<script type="text/javascript" src="js/add_vote_theme.js"></script>
	<link rel="shortcut icon" href="../images/favico.ico"/>
	<link rel="bookmark" href="../images/favico.ico"/>
	<title>不可錯過的10門課票選</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			<img src="../images/logo.jpg">
		</div>
		<?php
			include 'includes/adminnav.inc.php';
		?>
		<div id="main">
			<?php
				include 'includes/maintop.inc.php';
			?>
			<div id="add-theme">
				<form action="" method="post">
					<label>請輸入投票主題:<input type="text" name="theme" value="" class="add"/></label><br>
					請選擇投票主題開始時間:<br>
					<label><input style="width:35px" type="text" name="start_time_y" value="2016" class="add"/>年</label>
	        <label><select name="start_time_m">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option>
</select>月</label>
					<label><select name="start_time_d">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
</select>日</label>
         <label><select name="start_time_h">
<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option>
</select>時</label>
         <label><select name="start_time_min">
<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
<option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
<option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option>
<option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option>
<option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option>
<option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
<option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
</select>分</label>
         <label><select name="start_time_sec">
<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
<option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
<option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option>
<option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option>
<option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option>
<option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
<option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
</select>秒</label><br>
					  請選擇投票主題結束時間:<br>
						<label><input style="width:35px" type="text" name="dead_time_y" value="2016" class="add"/>年</label>
		        <label><select name="dead_time_m">
	<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
	<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
	<option value="11">11</option><option value="12">12</option>
	</select>月</label>
						<label><select name="dead_time_d">
	<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
	<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
	<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
	<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
	<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
	<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
	</select>日</label>
	         <label><select name="dead_time_h">
	<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
	<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
	<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
	<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
	<option value="21">21</option><option value="22">22</option><option value="23">23</option>
	</select>時</label>
	         <label><select name="dead_time_min">
	<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
	<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
	<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
	<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
	<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
	<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
	<option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
	<option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option>
	<option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option>
	<option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option>
	<option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
	<option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
	</select>分</label>
	         <label><select name="dead_time_sec">
	<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
	<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
	<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
	<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
	<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
	<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
	<option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option>
	<option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option>
	<option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option>
	<option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option>
	<option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option>
	<option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
</select>秒</label><br>
					<input type="submit" name="addtheme" value="添加主題" />&nbsp;&nbsp;<a href="javascript:;" onclick="history.back();">返回</a>
				</form>
			</div>
		</div>
		<?php
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>
