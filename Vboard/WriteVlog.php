<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?
include "../ticketDb.php"
?>
<!DOCTYPE html>
<html lang="zxx">
<?
require_once '../API/dbconn.php';
require_once '../view.php';
$conn = new DBC();//객체 생성
$conn->DBI(); //db접속
$layout = new layout;
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

	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<link href="../css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
	<style>
	#Review_write {
		width:900px;
		position:relative;
		margin:0 auto;
	}
	#write_area {
		margin-top:70px;
		font-size:14px;
	}
.bt_se {
	margin-top:20px;
	text-align:center;
}
.bt_se button {
	width:100px;
	height:30px;
}
.nse_content {
	width:99.6%;
	height:auto;
}
	</style>
</head>

<body>
	<?$layout -> head();?>
		<!--/banner-->
	<?$layout -> menu();?>
	<!--/main-->
	<section class="banner-bottom">
		<h3 class="tittle">Ticket Review</h3>
		<div class="container" >
			<div id="Write_area">

				<?
				session_start();
				$getMember = $_SESSION["id"];
				$sql = mq("select * from air_member where id = '".$getMember."'");
				$Myid = $sql->fetch_array();
			  ?>

				<form name="write_form" id="write_form" action="v_write_ok.php" method="post">
            <input class="form-control" type="text" id="vTitle" name="vTitle" placeholder="제목" maxlength="100" required="" />
            <input class="form-control" type="text" id="vNick" name="vNick" readonly="readonly" value="관리자" maxlength="100" required="" />
            <input class="form-control" type="text" id="vSrc" name="vSrc" placeholder="유튜브 영상 ID ex) https://www.youtube.com/watch?v=< 이 곳에 들어가는 값 >" maxlength="100" required="" />
            <textarea class="form-control" id="vContent" name="vContent" cols="10" rows="10" placeholder="내용. . ." required=""></textarea>
					<div class="bt_se">
						<button type="submit" class="btn btn-primary submit mb-4" id="save_btn">글 쓰기</button>
					</div>
				</form>
				</div>
      </div>
	</section>
	<!--//main-->
	<!--footer-->
	<?$layout -> footer();?>
			<!-- //footer -->
	<!---->

	<!-- js -->
	<script src="../js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- /js files -->
	<link href='../css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='../css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='../js/aos.js'></script>
	<script src="../js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="../js/move-top.js"></script>
	<script src="../js/easing.js"></script>
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
	<script src="../js/bootstrap.js"></script>


</body>

</html>
