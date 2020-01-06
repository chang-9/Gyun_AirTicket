<?php
	require_once './dbconn.php';

	$con = new DBC();//객체 생성
	$con->DBI(); //db접속

	$id = $_REQUEST['id'];
	$pass = md5($_REQUEST['pass']);
	$nick = $_REQUEST['nick'];
	//$e1 = trim($_REQUEST['userEmail']);
	//$e2 = trim($_REQUEST['userAddress']);
	//$email = $e1."@".$e2;
	$email = $_REQUEST['email'];
	/*echo $id."<br/>";
	echo $pass."<br/>";
	echo $nick."<br/>";
	echo $email."<br/>"; */ //잠시 출력용
	$date = date('Y-m-d');

	$response = array();

			$con->query = "select a_email from air_member where email='$email'";
			$con->DBQ();
			$num = $con->result->num_rows;

			if($num==0){
				$con->query = "insert into air_member(id, pass, nick, email, per) 
				values ('".$id."', '".$pass."', '".$nick."', '".$email."', 1)";
				$con->DBQ(); //쿼리 실행
				$in = $con->conn->affected_rows;
				if($in==0){
					//$response["success"] = true;
					echo '<script>alert("가입 성공"); location.replace("../index.php");</script>';
				}else{
					//$response["success"] = false;
					echo '<script>alert("가입 실패(서버 오류)"); history.back();;</script>';
				}
			}else{
				//$response["success"] = false;
				//$response["email"] = $email;
				echo '<script>alert("가입 실패(이메일 중복)"); history.back();;</script>';
			}
		
	
	$con->DBO();
	//echo json_encode($response);

?>