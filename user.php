<?php
require 'login.php';
if(isset($accessToken) && isset($_SESSION['codedata']) && isset($_POST['point']) && isset($_POST['codedata'])){
	if($_POST['codedata'] == $_SESSION['codedata']){
		$getuser = mysql_query("SELECT * FROM `flappybird` WHERE `fbid` = {$profile['id']}");
		$user = mysql_fetch_array($getuser);
		if($_POST['point'] > $user['point'])
			mysql_query("UPDATE `flappybird` SET `point`={$_POST['point']}, `time_update` = '".date("Y-m-d H:i:s")."'  WHERE `fbid` = {$profile['id']}");
		
		unset($_SESSION['codedata']);
		$_SESSION['codedata'] = md5(time());
		
		echo $_SESSION['codedata'];
	}
}