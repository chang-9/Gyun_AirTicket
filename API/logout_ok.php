<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->
<?php
	session_start();
	require_once './dbconn.php';
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속
	

	session_destroy();
	echo '<script>alert("로그아웃 되었습니다."); location.replace("../index.php");</script>';
	

	




 
?>