<?
include "./ticketDb.php"
?>
<!DOCTYPE html>
<html lang="zxx">
<?
session_start();
	
	require_once './API/dbconn.php';
	require_once 'view.php';
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속
	$layout = new layout;
	?>

<head>


	<title>회원가입 및 로그인 사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css" />
</head>
<body>
	<div id="login_box">
		<h1>로그인</h1>							
			<form method="post" action="/member/login_ok.php">
				<table align="center" border="0" cellspacing="0" width="300">
        			<tr>
            			<td width="130" colspan="1"> 
                		<input type="text" name="userid" class="inph">
            		</td>
            		<td rowspan="2" align="center" width="100" > 
                		<button type="submit" id="btn" >로그인</button>
            		</td>
        		</tr>
        		<tr>
            		<td width="130" colspan="1"> 
               		<input type="password" name="userpw" class="inph">
            	</td>
        	</tr>
        	<tr>
           		<td colspan="3" align="center" class="mem"> 
              	<a href="/member/member.php">회원가입 하시겠습니까?</a>
           </td>
        </tr>
    </table>
  </form>
</div>
</body>
</html>