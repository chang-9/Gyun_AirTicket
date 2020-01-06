<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->
<?php
	require_once './dbconn.php';
	session_start();
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속
	
	$form_cer =$_POST['cer'];

?>
	<form action="email_certification.php" name = "cer_form" method="Post">
	
		<div class="jh">인증번호를 입력해주세요.</div>
		<div><input type="text" name="cer" id="cer" value="" placeholder="4자리 숫자">
		<button type="submit" value="인 증" >인 증</button></div>
	</form>

	<?

?>

