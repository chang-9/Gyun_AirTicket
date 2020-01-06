<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->

<?php
	session_cache_expire(360);
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require_once './dbconn.php';
	
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속

 
	$toemail = $_GET['email'];
	$cer = $randomNum = mt_rand(1000,10000);

	$_SESSION[cer]=$cer;
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	echo $cer;
	echo $_SESSION[cer];
	echo $toemail;
	echo '\n';
	

		//Server settings
		$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ckdrbs24@gmail.com';                 // SMTP username
		$mail->Password = 'Tmvkrpxl1!';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom('ScheduleKiller@gmail.com', 'ScheduleKiller');
		$mail->addAddress($toemail, '고객님');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'SchduleKiller에서 인증번호를 보냈습니다.';
		$mail->Body    = '<h1>인증번호는<p>'+$_SESSION[cer]+'</p>입니다.</h1>';

		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->Send()){
			?>
			<script> 
				alert("아이디를 입력하지 않았습니다."); 
				self.close();
			</script>

	<?
			
		}
		else{?>
			<script>location.href="./email_send.php";</script>
	<?	}
	
	 
	
?>


	


