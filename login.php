<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="ko">
<?
require_once './API/dbconn.php';
require_once 'view.php';
session_start();
$layout = new layout;

$conn = new DBC; //객체 생성
$conn->DBI(); //함수 접근 (DB접속)

/*$conn->query = "select id, pass, permit from airticket where id='".$id."' and pass=password('".$pass."')";// 객체의 쿼리 변수에 대입
$conn->DBQ(); //함수 접근 (쿼리 실행)

$num = $conn->result->num_rows;// 객체지향 방법
$data = $conn->result->fetch_row();

$conn->DBO();// 함수 접근 (DB접속 해제)*/
?>

<head>
	<title>일정&특가는 우리가 관리한다!</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
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
	<style>
		@import url(//fonts.googleapis.com/earlyaccess/nanumpenscript.css);
		@import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
		@import url(//fonts.googleapis.com/earlyaccess/jejumyeongjo.css);
		@import url(//fonts.googleapis.com/earlyaccess/kopubbatang.css);
		@import url(//fonts.googleapis.com/earlyaccess/nanumbrushscript.css);
		@import url(//fonts.googleapis.com/earlyaccess/notosanskr.css);
		@import url(//fonts.googleapis.com/earlyaccess/hanna.css);
		@import url(//fonts.googleapis.com/earlyaccess/nanumgothic.css);
		@import url(//fonts.googleapis.com/earlyaccess/nanummyeongjo.css);
		@import url(//fonts.googleapis.com/earlyaccess/jejuhallasan.css);
		@import url(//fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);
		 
		.centered { display: table; margin-left: auto; margin-right: auto; }
		.np{font-family: 'Nanum Pen Script', cursive;}
		.jg{font-family: 'Jeju Gothic', sans-serif;}
		.jm{font-family: 'Jeju Myeongjo', serif;}
		.kb{font-family: 'KoPub Batang', serif;}
		.nb{font-family: 'Nanum Brush Script', cursive;}
		.ns{font-family: 'Noto Sans KR', sans-serif;}
		.hn{font-family: 'Hanna', sans-serif;}
		.ng{font-family: 'Nanum Gothic', sans-serif;}
		.nm{font-family: 'Nanum Myeongjo', serif;}
		.jh{font-family: 'Jeju Hallasan', cursive;}
		.ngc{font-family: 'Nanum Gothic Coding', monospace;}
		
	</style>
</head>

<body>
	<?$layout -> head();?>
	<!--/banner-->
<?$layout -> menu();?>
	<!--//nav-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php"><label class ="jh">Home</label></a>
		</li>
		<li class="breadcrumb-item active"><label class ="jh">로그인</label></li>
	</ol>
	<!--/main-->
	<section class="banner-bottom">
		<div class="container">
			<div class="centered">
				<h2 class="jh">로그인</h2>
			</div>
			<div class="row inner-sec">
				<div class="login p-5 bg-dark mx-auto mw-100">
					<form action="./API/login_ok.php" method="post">
						<div class="form group">
							<label for="id"class ="jh">아이디</label>
							<input type="text" class="form-control" id="id" name="id" placeholder="" style = "margin : 0 0 15px 0;" required>
						</div>
						<div class="form-group">
							<label for="pass" class = "jh">비밀번호</label>
							<input type="password" class="form-control" id="pass" name="pass" placeholder=""  required>
						</div>
						<div class="form-check mb-2">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1"><div class ="jh">아이디 저장</div></label>
						</div>
						<button type="submit" class="btn btn-primary submit mb-4" ><div class ="jh">로그인</div></button>
						<p>
							<a href="register.php" class ="jh">아이디가 없으신가요?</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--//main-->
	<!--footer-->
	<?$layout-> footer()?>
	<!---->

	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	 <!-- /js files -->
	<link href='css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='js/aos.js'></script>
	<script src="js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
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


</body>

</html>
