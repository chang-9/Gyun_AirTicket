<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">
<?
	require_once 'API/dbconn.php';
	require_once 'view.php';
	include "./ticketDb.php";
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
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
</head>
<style>

#main-size {
	text-align: center;
	font-size: 3.5em;
	color: #2c363e;
}
#write_btn {
	position: absolute;
	margin-top:20px;
	right: 0;
}

#ticketTitle {
	position: absolute;
	margin-top:20px;
	bottom: 40%;
	right: 20%;
}

.left-box {
  float: left;
  width: 500px;
  height:500px;
}
.right-box {
  
  float: right;
  width: 500;

}
.list-table {
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	text-align: center;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px
}
@media( max-width: 640px ) {
    #tickets,
    #tickets thead,
    #tickets tbody,
    #tickets tr,
    #tickets th,
    #tickets td {
        display: block;
        /* table와 하위 요소들의 display 속성을 변경합니다. */
    }
 
    #tickets tr {
        border-bottom: 1px solid #ddd;
    }
 
    #tickets th,
    #tickets td {
        border-top: none;
        border-bottom: none;
    }
}
</style>
<body>
	<?$layout->head();?>
		<!--/banner-->
	<?$layout->menu();?>
		<!--//nav-->
		<!--/inner-content-->
		<!--/banner-bottom-->
	<?

		$sql = mq("select * from a_Event");
		$row_num = mysqli_num_rows($sql);
		$sql2 = mq("select * from a_Event order by a_eventNo asc "); // 게시글의 수를 a_ticketNo 순으로 5개까지 표시되게 함
        $board = $sql2->fetch_array()
	?>
	
	
	<section class="banner-bottom">
		<div class="container">
			<div class="row inner-sec">
				<a href = "https://flyasiana.com/C/KR/KO/event/<?php echo $board['a_nextpage']; ?> " target = "_blank" class="col-lg-6 about-img" data-aos="flip-right">
				<img src="<?php echo $board['a_eventImage']; ?>" class="img-fluid" alt="">
			
			<div class="col-lg-6 about-info text-left" data-aos="flip-left" >
				<p class="sub-hd mb-4" style="font-size: 28px;"><a href=""><?php echo $board['a_eventTitle'];?></p>
				<p><?php echo $board['a_eventContent'];?> </p>
				</a>
			</div>
		</div>
			<div>
				<table id= "tickets" class="list-table">
				
					<thead>
					
						<!-- 상단열 제목들을 다음과 같이 선언 -->
						<tr>
							<th width="70">No</th>
							<th width="500">Title</th>
							<th width="120">Name</th>
							<th width="100">Date</th>
							<th width="100">Views</th>
						</tr>
					</thead>

					<?php
						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}else{
							$page = 1;
						}
						$sql = mq("select * from a_ticketReviews");
						$row_num = mysqli_num_rows($sql);
						$list = 5;
						$block_ct = 5;

						$block_num = ceil($page/$block_ct);
						$block_start = (($block_num - 1) * $block_ct) + 1;
						$block_end = $block_start + $block_ct - 1;

						$total_page = ceil($row_num / $list);
						if($block_end > $total_page) $block_end = $total_page;
							$total_block = ceil($total_page/$block_ct);
							$start_num = ($page-1) * $list;


						$sql2 = mq("select * from a_ticketReviews order by a_ticketNo desc limit $start_num, $list"); // 게시글의 수를 a_ticketNo 순으로 5개까지 표시되게 함
						while($board = $sql2->fetch_array()){
							$a_ticketTitle = $board["a_ticketTitle"];

							if(strlen($a_ticketTitle)>30){
								$a_ticketTitle=str_replace($board["a_ticketTitle"],mb_substr($board["a_ticketTitle"],0,30,"utf-8")."...",$board["a_ticketTitle"]); // 게시글이 30자가 넘을경우 ... 이 표시되게 함
						}
						$sql3 = mq("select * from reply where con_num='".$board['a_ticketNo']."'");
						$rep_count = mysqli_num_rows($sql3);
					?>

					<tbody>
						<!-- 내용을 테이블로부터 가져와서 보여줌 -->
						<tr>
							<td width="70"><?php echo $board['a_ticketNo']; ?></td>
							<td width="500"><a href="./Review/ReviewRead.php?tNo=<?php echo $board['a_ticketNo']; ?>"><?php echo $a_ticketTitle;?>
								<span style="font-weight:bold; color:blue">[<? echo $rep_count ?>]</a></td>
							<td width="120"><?php echo $board['a_nick']; ?></td>
							<td width="100"><?php echo $board['a_ticketDate']; ?></td>
							<td width="100"><?php echo $board['a_ticketViews']; ?></td>
					 </tbody>
				 <?php } ?>
				</table>
				<div id ='write_btn'>
			<h6><a href= "http://webtesting0001.dothome.co.kr/airticket/ticketReview.php">More reviews</a></h6>
		</div>
	       </div>
			</div>
		</div>
	</section>

	
	


	<!--//banner-bottom-->
	<!--/banner-bottom-->

	<!--footer-->
	<?$layout -> footer();?>
	<!---->

	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- /flexisel -->
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script src="js/jquery.flexisel.js"></script>
	<!-- //flexisel -->
	<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->

	<!-- simpleLightbox -->
	<script src="js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->
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
				$('php,body').animate({
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
