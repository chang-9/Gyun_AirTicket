<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$db = new mysqli("localhost","webtesting0001","ccit1234#","webtesting0001");
	$db->set_charset("utf8");

	function mq($sql){
		global $db;
		return $db->query($sql);
	}
	$Pass = $_POST['password'];
	$checkId = $_SESSION['id'];
	$checkPass = md5($Pass);

	echo $Pass;
	echo $checkPass;

	$sql = mq("select * from air_member where id = '".$checkId."' AND pass = '".$checkPass."'");
	$sql2 = mq("select * from air_member where id = '".$checkId."'");

	$compare1 = $sql->fetch_array();
	$compare2 = $sql2->fetch_array();
	$num = $sql->num_rows;
	echo $num;

	if($num==1){
		$sql3 = mq("delete from air_member where id = '".$checkId."'");

		session_destroy();
		
	echo '<script>alert("탈퇴"); location.replace("../index.php");</script>';

	}

?>
