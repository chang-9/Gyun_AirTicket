<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include "./ticketDb.php"
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
  #Review_Modify {
    width:900px;
    position:relative;
    margin:0 auto;
  }
  #modify_area {
    margin-top:70px;
    font-size:14px;}
  .bt_se {
  margin-top:20px;
  text-align:center;
  }
  .bt_se button {
  width:100px;
  height:30px;
  }
	</style>
</head>

<body>
	<?$layout -> head();?>
		<!--/banner-->
	<?$layout -> menu();?>
	<!--/main-->
	<section class="banner-bottom">
		<div class="Review_Modify">
		 <h3 class="tittle">Event</h3>
	  	<?php
		  $bno = $_GET['a_eventNo'];
		  $sql = mq("select * from a_Event where a_eventNo='$bno';");
		  $board = $sql->fetch_array(); // 결과를 board에 넣음
		  ?>
		 <div class="container">
			 <div id="write_area">
				 <form action="event_modify_ok.php" method="post">
           <input type="hidden" name="a_eventNo" value="<?=$bno?>" />
					 <textarea class="form-control" type="text" name="a_eventTitle" placeholder="제목" required=""><?php echo $board['a_eventTitle']; ?></textarea>
					 <textarea class="form-control" type="text" name="a_nick" placeholder="글쓴이" required=""><?php echo $board['a_nick']; ?></textarea>
					 <textarea class="form-control" rows="1" cols="55" name="a_eventContent" placeholder="내용. . ." required=""><?php echo $board['a_eventContent']; ?></textarea>
         <div class="bt_se">
           <button type="submit">글 수정</button>
         </div>
         </form>
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
