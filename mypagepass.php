<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

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

<?
   if(!$_SESSION["id"]){
?>
    <script>
        alert('로그인 정보가 없는 상태입니다.');
        history.back();
    </script>
<?
  }
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
<script type="text/javascript" src="../js/email_check.js"></script>

	<title>일정은 우리가 관리한다.!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Baked a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
</head>

<body>


<?$layout -> head();?>
	<!--/banner-->
<?$layout -> menu();?>

	<!--//nav-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Signin</li>
	</ol>
	<!--/main-->

	<section class="banner-bottom">
		<div class="container">

		<?
		$getMember = $_SESSION['id'];
		$sql = mq("select * from air_member where id='".$getMember."'");
		$Myid = $sql->fetch_array();
		?>

			<h3 class="tittle">my_page</h3>

<button type="button" class="btn btn-primary submit mb-1" value="글쓰기" name="" onclick="location.href='http://webtesting0001.dothome.co.kr/airticket/mypage.php' ">회원정보<n button=""></n></button>

<button type="button" class="btn btn-primary submit mb-1" value="글쓰기" name="" onclick="location.href='http://webtesting0001.dothome.co.kr/airticket/mypagefix.php' ">회원정보수정<n button=""></n></button>

<button type="button" class="btn btn-primary submit mb-1" value="비밀번호수정" name="" onclick="location.href='http://webtesting0001.dothome.co.kr/airticket/mypagepass.php' ">비밀번호 수정<n button=""></n></button>

<button type="button" class="btn btn-primary submit mb-1" value="회원탈퇴" name="" onclick="location.href='http://webtesting0001.dothome.co.kr/airticket/mypageleave.php' ">회원 탈퇴<n button=""></n></button>

<button type="button" class="btn btn-primary submit mb-1" value="활동내역" name="" onclick="possiblenick()">활동내역<n button=""></n></button>


<!--ID -->

<div class="login p-5 bg-dark mx-auto mw-100">
	<div class="container">
		<form action="mypagepasschange.php" method="post">
			<p>아이디</p>
			<input type="hidden" id="idx" name="idx" value="<? echo $Myid['idx'] ?>">
			<input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<? echo $Myid['id']?>">
			<p>현재 비밀번호를 입력하세요</p>
			<input type="password" class="form-control" id="password1" name="password1">
			<p>변경하실 비밀번호를 입력하세요</p>
			<input type="password" class="form-control" id="password2" name="password2">
			<button type="submit" class="btn btn-primary submit mb-1" >변경</button>
		</form>
	</div>
</div>


	</section>
	<!--//main-->
	<!--footer-->
	<?$layout->footer();?>
	<!---->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("pass").onchange = validatePassword;
			document.getElementById("pass2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("pass2").value;
			var pass1 = document.getElementById("pass").value;
			if (pass1 != pass2)
				document.getElementById("pass2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("pass2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
    <!-- /js files -->
	<link href='css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='js/aos.js'></script>
	<script src="js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>

	<!--// end-smoth-scrolling -->

	<script>
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear'
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- //Custom-JavaScript-File-Links -->
	<script src="js/bootstrap.js"></script>



</script>


   </script>



</body>

</html>
