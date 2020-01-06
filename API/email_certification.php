<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->
<?php
	require_once './dbconn.php';
	session_start();
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속
	
	$form_cer =$_POST['cer'];



	
	if($form_cer == ''){
		?>
		<script>
			alert("인증번호를 입력해주세요.");
			location.href="./email_send.php";
			document.cer_form.focus();
		</script>
		<?php
	}else{
		if($form_cer == $_SESSION[cer])
		{?>
		<script>
			alert("인증이 완료되었습니다.");
			if (opener != null) {
					opener.chkForm = null;
					self.close();
				} 
			
		</script>
		<?
		}else{
			?>
			<script>
				alert("인증번호가 다릅니다.");
				history.back();
				location.href="./email_send.php";
				document.cer_form.focus();
				
			</script>

			
	<?	}
	}

?>

