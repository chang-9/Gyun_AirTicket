<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include "./ticketDb.php";
?>

<!DOCTYPE html>
<html lang="zxx">
<?
require_once 'API/dbconn.php';
require_once 'view.php';
$conn = new DBC();//객체 생성
$conn->DBI(); //db접속
$layout = new layout;
?>

<head>
	<title>일정&특가는 우리가 관리한다!</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
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
  * {
	margin: 0 auto;
	padding: 0;
	font-family: 'Malgun gothic','Sans-Serif','Arial';
}
a {
	text-decoration: none;
	color:#333;
}
ul li {
	list-style:none;
}

/* 공통 */
.fl {
	float:left;
}
.tc {
	text-align:center;
}
	#Event_Read {
 	width:900px;
 	position: relative;
 	word-break:break-all;
 }
 #eventTitle {
	 font-size:28px;
 }
 #user_info {
 	font-size:14px;
 }
 #user_info ul li {
 	float:left;
 	margin-left:10px;
 }
 #bo_line {
 	width:100%;
 	height:2px;
 	background: gray;
 	margin-top:20px;
 }
 #bo_content {
 	margin-top:20px;
 }
 #bo_ser {
 	font-size:14px;
 	color:#333;
 	position: absolute;
 	right: 0;
 }
 #bo_ser > ul > li {
 	float:left;
 	margin-left:10px;
 }
#bo_picture{
  margin-top:15px;
}
	</style>
</head>

<body>
	<?$layout -> head();?>
		<!--/banner-->
	<?$layout -> menu();?>
	<!--/main-->
	<section class="banner-bottom">
		<h3 class="tittle">Event</h3>

<!-- 글 불러오기 -->
<section class="banner-bottom">
	<div class="container">
    <?php
		$bno = $_GET['a_eventNo'];
		$hit = mysqli_fetch_array(mq("select * from a_Event where a_eventNo ='".$bno."'"));
		$hit = $hit['a_eventViews'] + 1;
		$fet = mq("update a_Event set a_eventViews = '".$hit."' where a_eventNo = '".$bno."'");
		$sql = mq("select * from a_Event where a_eventNo='".$bno."'");
		$board = $sql->fetch_array();
	  ?>
   <div id="Event_Read">
		 <!-- 제목 출력 -->
	  <div id="eventTitle"><?php echo $board["a_eventTitle"]; ?></div>
		 <div id="user_info">
			 <!-- 이름, 날짜, 조회수 출력 -->
			<?php echo $board["a_nick"]; ?> |  <?php echo $board["a_eventDate"]; ?> |  조회: <?php echo $board["a_eventViews"]; ?>
				<div id="bo_line"></div>
		 </div>
     <div id="bo_picture">
       <img src="./EventImages/<?php echo $board['a_eventImage'];?>">
			</div>
			<div id="bo_content">
				<!-- 내용 출력 -->
				<?php echo nl2br("$board[a_eventContent]"); ?>
			</div>
			<!-- 목록, 수정, 삭제 -->
			<div id="bo_ser">
				<ul>
					<li><a href="Event.php">[목록으로]</a></li>
					<li><a href="EventModify.php?a_eventNo=<? echo $board['a_eventNo']; ?>">[수정]</a></li>
          <li><a href="event_delete.php?a_eventNo=<? echo $board['a_eventNo']; ?>">[삭제]</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
	<!--//main-->
	<!--footer-->
	<?$layout -> footer();?>
			<!-- //footer -->
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
