<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$db = new mysqli("localhost","webtesting0001","ccit1234#","webtesting0001");
	$db->set_charset("utf8");

	function mq($sql){
		global $db;
		return $db->query($sql);
	}
	$curPass = $_POST['password1'];
	$chgPass = $_POST['password2'];

	$curID = $_SESSION['id']; //할당연산자 curID에 session 값 표현으로 설정됨.

	$mCurpass = md5($curPass); //암호화를 md5로 하기때문에 DB삽입전 암호화시켜서 넣는다.

	$mChgpass = md5($chgPass);  

	$sql = mq("select * from air_member where id = '".$curID."'"); //air_member 테이블에서 id행에서 컬럼이 curID 변수에 대입된값과 같은 컬럼의 모든 행을 가져와서 sql 변수에 담는다
	$compareID = $sql -> fetch_array();

	if($mCurpass != $mChgpass) //$mCurpass 와 $mChgpass 가 같지않으면 True 현재 비밀번호와 동일한값을 입력하면 안됩니다.
	{
		if($compareID['pass'] == $mCurpass) //만약 같다면
		{
			$sql2 = mq("update air_member set pass = '".$mChgpass."' where id = '".$curID."'"); ?>
			<script>alert("비밀번호 변경이 완료되었습니다!"); window.location.href="http://webtesting0001.dothome.co.kr/airticket/index.php"</script>
			<? session_destroy();
		 }
		else
		{
			?><script>alert("현재 비밀번호가 로그인한 정보와 일치하지 않습니다!"); window.location.href="http://webtesting0001.dothome.co.kr/airticket/mypagepass.php"</script>
			<? return false;
		}
	}
	else
	{
		?><script>alert("현재 비밀번호와 다른 비밀번호를 입력해주세요!"); window.location.href="http://webtesting0001.dothome.co.kr/airticket/mypagepass.php"</script>
	<? return false;
	}
?>
