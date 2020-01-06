<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->
<?php
	require_once './dbconn.php';
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속

 
	$nickch = $_GET['nick'];
	 

	 
	$con->query = "SELECT * FROM air_member WHERE nick='".$nickch."'";
	$con->DBQ();
	$num = $con->result->num_rows; //객체지향 방법 
	$data = $con->result->fetch_row();


	if($nickch == ''){
		?>
		<script>
			alert("아이디를 입력하지 않았습니다.");history.back();
		</script>
		<?php
		}
				
		else{
		
		if($num == 0){
			?>
			<div style="color:green">
				<div>
					<?=$nickch?>는 사용가능한 닉네임입니다.
					<input type="button" value="사용하기" onclick="parent('<?=$nickch?>','1')">
				</div>
			</div>
		
			<form action="checknick.php" method="get">
				<div>다른 닉네임을 검색하시려면 ▼</div>
				<div><input type="text" name="nick" value="" placeholder="닉네임을 입력해주세요.">
			<input type="submit" value="중복확인" onclick=""></div>
			</form>
		
		<?php
		}else{
		?>
		<div style="color:red">
			<div>
				<?=$nickch?>와 같은닉네임가 존재합니다.
			</div>
		</div>
		
		<form action="checknick.php" method="get">
			<div>다른 아이디를 검색하시려면 ▼</div>
			<div><input type="text" name="nick" value="" placeholder="아이디를 입력해주세요.">
			<input type="submit" value="중복확인" onclick=""></div>
		</form>
		
		</div>
		<?php
		}
	}
	?>

<script>
	function parent(nick){
		var du = window.opener;
		
		opener.document.register_form.nickDuplication.value ="nickCheck";
			// 회원가입 화면의 ID입력란에 값을 전달
		du.nick.value = nick;
			
			
			if (opener != null) {
				opener.chkForm = null;
				self.close();
			} 

		
		
	   

		
	}
</script>


	


