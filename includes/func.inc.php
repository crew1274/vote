<?php
function encrypt($data, $key)
{$key = md5($key);
    $x  = 0;
    $len = strlen($data);
    $l  = strlen($key);
    for ($i = 0; $i < $len; $i++)
    {if ($x == $l)
        {$x = 0;}
        $char .= $key{$x};
        $x++;  }
    for ($i = 0; $i < $len; $i++)
    {$str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);  }
    return base64_encode($str);
}

function decrypt($data, $key)
{$key = md5($key);
    $x = 0;
    $data = base64_decode($data);
    $len = strlen($data);
    $l = strlen($key);
    for ($i = 0; $i < $len; $i++)
    {if ($x == $l)
        { $x = 0;}
        $char .= substr($key, $x, 1);
        $x++;  }
    for ($i = 0; $i < $len; $i++)
    {if(ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
        {$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));}
        else
        {  $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));  }  }
    return $str;
}

function forget_password_send_mail($student_id,$student_name,$password)
{
  require ('PHPMailer/PHPMailerAutoload.php');
	date_default_timezone_set('Asia/Taipei');
	mb_internal_encoding('UTF-8');
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "50156gm@gmail.com";
	$mail->Password = "gmgm50156";
	$mail->setFrom('50156gm@gmail.com', '國立成功大學課務組');
	$mail->addReplyTo('50156gm@gmail.com', '國立成功大學課務組');
	$mail->addAddress($student_id.'@mail.ncku.edu.tw',$student_id);
	$mail->Subject = '不可錯過十門課投票系統密碼驗證信';
  $mail->Body = '你好,'.$student_name.'同學:<br>
  你申請密碼驗證碼是:<b>'.$password.'</b><br>
  <a href="http://140.116.39.225/vote/forget_1.php?student='.$student_id.'">請點此連結繼續完成密碼更新的流程!</a>
  <br><br>
  國立成功大學課務組';
  $mail->AltBody = '你好,'.$student_name.'同學:<br>
  你申請密碼驗證碼是:<b>'.$password.'</b><br>
  <a href="http://140.116.39.225/vote/forget_1.php?student='.$student_id.'">請點此連結繼續完成密碼更新的流程!</a><br>
  如果你沒有申請此服務，請忽略本信，謝謝。<br><br>
  國立成功大學課務組';
  if ($mail->send()) {
  }
}

function send_mail($student_id,$student_name,$student_password,$encrypt)
{
  require ('PHPMailer/PHPMailerAutoload.php');
	date_default_timezone_set('Asia/Taipei');
	mb_internal_encoding('UTF-8');
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "50156gm@gmail.com";
	$mail->Password = "gmgm50156";
	$mail->setFrom('50156gm@gmail.com', '國立成功大學課務組');
	$mail->addReplyTo('50156gm@gmail.com', '國立成功大學課務組');
	$mail->addAddress($student_id.'@mail.ncku.edu.tw',$student_id);
	$mail->Subject = '不可錯過十門課投票系統驗證信';
  $mail->Body = '你好,'.$student_name.'同學:<br>
  謝謝你參與我們的投票活動，<a href="http://140.116.39.225/vote/authentication.php?authentication='.$encrypt.'">請點此連結選來驗證你的帳號!</a><br>
  並請記得你的密碼<i>'.$student_password.'</i>，方便日後登入網站參與其他的投票活動，謝謝。<br><br>
  國立成功大學課務組';
  $mail->AltBody = '你好,'.$student_name.'同學:<br>
  謝謝你參與我們的投票活動，<a href="http://140.116.39.225/vote/authentication.php?authentication='.$encrypt.'">請點此連結選來驗證你的帳號!</a><br>
  並請記得你的密碼<i>'.$student_password.'</i>，方便日後登入網站參與其他的投票活動，謝謝。<br><br>
  國立成功大學課務組';
  if ($mail->send()) {
  }
}

function chk($par,$min,$max,$field){
	if(empty($par)){
		alertBack($field.'不能為空!');
	}
	if(mb_strlen($par,'UTF-8') < $min || mb_strlen($par,'UTF-8') > $max){
		alertBack($field.'長度不能小於'.$min.'位或大於'.$max.'位!');
	}
	$preg = '/[<>\/\\\ \  ]/';
	if(preg_match($preg , $title)){
		alertBack($field.'不能包含敏感字串!');
	}
	return $par;
}


function checkUser($user,$min,$max){
	$user = trim($user);
	if(empty($user)){
		alertBack('用戶名稱不能為空');
	}

	if(mb_strlen($user,'UTF-8') < $min || mb_strlen($user,'UTF-8') > $max){
		alertBack('用戶名稱長度不能小於'.$min.'或不能大於'.$max.'位!');
	}

	if(preg_match('/[<>\\\ \'\"]/', $user)){
		alertBack('帳號包含非法字串!');
	}
	return $user;
}

function checkPass($pass,$min,$max){
	if(empty($pass)){
		alertBack('密碼不能為空!');
	}
	if(mb_strlen($pass,'UTF-8') < $min || mb_strlen($pass,'UTF-8') > $max){
		alertBack('帳號名稱不能小於'.$min.'或不能大於'.$max.'位!');
	}
	return sha1($pass);
}


//弹窗并返回
function alertBack($info){
	echo '<script>alert(\''.$info.'\');history.back();</script>';
	exit();
}

//弹窗并跳转
function alertLocation($info,$url){
	echo "<script>alert('$info');location.href='$url'</script>";
	exit();
}

//mysql执行函数
function mysqlQuery($sql){
	if(!$rs = mysql_query($sql)){
		die('SQL執行失敗:'.mysql_error());
	}
	return $rs;
}


/*只能获取结果集中的第一条数据
 * @param string $sql sql语句
 * */
function mysqlFetchArray($sql){
	return mysql_fetch_array(mysqlQuery($sql));
}

//获取结果集中的所有数据
/*
*@param $result 参数只能是结果集
*/
function fetchArray($result){
	return mysql_fetch_array($result);
}

//判断是否有权限访问页面
function isAccess(){
	if(!isset($_SESSION['admin'])){
		alertLocation('没有權限,請先登入!', 'login.php');
	}
}

//对要在页面输出的字符串进行过滤再输出
function htmlSpecial($string) {
	if (is_array($string)) {
		foreach ($string as $key => $value) {
			$string[$key] = htmlSpecial($value);   //这里采用了递归，如果不理解，那么还是用htmlspecialchars
		}
	} else {
		$string = htmlspecialchars($string);
	}
	return $string;
}


//对要插入数据库的字符串先进行过滤然后再插入数据库
function mysqlRealEscape($string){
	if(get_magic_quotes_gpc() == 'false'){
		if(is_array($string)){
			foreach($string as $key => $value){
			$string[$key] = mysql_real_escape_string($value);
			}
		}else{
			$string = mysql_real_escape_string($string);
		}
	}
		return $string;
}

	//标题长度
function chkNtitle($title,$min,$max){
	if(empty($title)){
		alertBack('標題不能為空!');
	}
	if(mb_strlen($title,'UTF-8') < $min || mb_strlen($title,'UTF-8') > $max){
		alertBack('標題長度不能小於'.$min.'位或大於'.$max.'位!');
	}
	$preg = '/[<>\/\\\ \  ]/';
	if(preg_match($preg , $title)){
		alertBack('標題不能包含敏感字串!');
	}
	return $title;
}


//内容长度
function chkNcontent($describe,$min,$max){
if(empty($describe)){
		alertBack('内容不能為空!');
		}
		if(mb_strlen($describe,'UTF-8') < $min || mb_strlen($describe,'UTF-8') > $max){
		alertBack('内容長度不能小於'.$min.'位或大於'.$max.'位!');
		}
		return $describe;
	}

				//搜索关键字
function chkSearchKeyword($keyword){
	if(empty($keyword)){
	alertBack('搜尋關鍵字不能為空!');
		}
	return $keyword;
		}

	//搜索类型
function chkSearchType($type){
	if(empty($type)){
		alertBack('請選擇搜尋類型!');
	}
	return $type;
}

function chkFileExtenName($type,$file){
	$extName = strrchr($file, '.');		//获取文件的扩展名
	$str = '';
	if(!in_array($extName, $type)){
		if(is_array($type)){
			foreach ($type as $value) {
				$str .= $value.',';
			}
		}else{
			$str = $type;
		}
	alertBack('只支持'.$str.'類型');
	}
}

							function chkFileError($file){
							if($file > 0){
							switch ($file) {
							case '1':
							alertBack('上傳文件的大小超過伺服器允許的最大額度!');
							break;
							case '2':
									alertBack('上傳文件的大小表單超過允許的最大額度!');
									break;
							case '3':
							alertBack('部分文件被上傳!');
							break;
							case '4':
							alertBack('没有文件被上傳!');
							break;
							}
							}
							}

/*简单分页函数*/
function pageList($info,$lj,$pagenum,$page){
	//global $page;
	echo '<div id="pagelist-num">';
	echo '<ul>';
	for($i=0;$i<$pagenum;$i++){
	if($page == $i+1){
		echo '<li><a href="'.$info.$lj.'page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
				echo "\n";
		}else{
		echo '<li><a href="'.$info.$lj.'page='.($i+1).'">'.($i+1).'</a></li>';
		echo "\n";
		}
	}
	echo '</ul>';
	echo '</div>';
}

/*文本分页函数*/
function pageListText($info,$lj,$pagenum,$page){
	//global $page;
	echo '<div id="pagelist-text">';
	echo '<ul>';
	echo '<li>'.$page.'/'.$pagenum.'頁&nbsp;&nbsp;';
	if($page == 1){
		echo '第一頁&nbsp;&nbsp;';
		echo '上一頁&nbsp;&nbsp;';
	}else{
		echo '<a href="'.$info.'">首頁</a>&nbsp;&nbsp;';
		echo '<a href="'.$info.$lj.'page='.($page-1).'">上一頁</a>&nbsp;&nbsp;';
	}
	if ($page == $pagenum) {
		echo '下一頁&nbsp;&nbsp;';
		echo '尾頁&nbsp;&nbsp;';
	} else {
		echo '<a href="'.$info.$lj.'page='.($page+1).'">下一頁</a>&nbsp;&nbsp;';
		echo '<a href="'.$info.$lj.'page='.$pagenum.'">最後一頁</a></li>';
	}

	echo '</ul>';
	echo '</div>';
}

?>
<script type="text/javascript">
setInterval(function() {
    var currentTime = new Date ( );
		var currentYears = currentTime.getFullYear ( );
		var currentMonth = currentTime.getMonth ( )+1;
		var currentDays = currentTime.getDate ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
    var currentTimeString = currentYears+"/"+currentMonth+"/"+currentDays+"  "+timeOfDay+" "+currentHours + ":" + currentMinutes + ":" + currentSeconds;
    document.getElementById("timer").innerHTML = currentTimeString;
}, 1000);
 </script>
