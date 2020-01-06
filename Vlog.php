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
	<!-- 개인 스타일 지정 -->
	<style>
	#page_num {
		font-size: 18px;
		margin-left: 35%;
		margin-top:50px;
	}
	#page_num ul li {
		float: left;
		margin-left: 10px;
		text-align: right;
	}
	#page_num a {
		margin-left: 15px;
	}
	.fo_re {
		font-weight: bold;
		color:blue;
		margin-left: 15px;
	}
  </style>
</head>

<body>
	<?$layout -> head();?>
		<!--/banner-->
	<?$layout -> menu();?>
	<!--/main-->

	<section class="banner-bottom">
	<div class="container">
		<h3 class="tittle">V-LOG</h3>

		<div style="border-top:8px; margin-bottom: 30px"></div>
			<div class="row inner-sec" id="updates">
				<?
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
				$sql = mq("select * from Vlog");
				$row_num = mysqli_num_rows($sql); // Vlog 테이블의 모든 행의 수를 $row_num에 넣음
				$list = 6;
				$block_ct = 5;

				$block_num = ceil($page/$block_ct);
				$block_start = (($block_num - 1) * $block_ct) + 1;
				$block_end = $block_start + $block_ct - 1;

				$total_page = ceil($row_num / $list);
				if($block_end > $total_page) $block_end = $total_page;

				$total_block = ceil($total_page/$block_ct);
				$start_num = ($page-1) * $list;


			  $sql2 = mq("select * from Vlog order by vIdx desc limit $start_num, $list");
				while($board = $sql2->fetch_array())
				{
					$Title = $board["vTitle"];

					if(strlen($Title)>30)
					{
						$Title = str_replace($board["vTitle"],mb_substr($board["vTitle"],0,40,"utf-8")."...",$board["vTitle"]);
					}
					?>
      	<div class="col-lg-4 col-md-4 col-sm-7 col-xs-8 mb-4">
        	<div class="card" style="width:18rem;">
          	<a href="./Vboard/ReadVlog.php?vno=<?echo $board['vIdx']?>">
            	<img class="card-img-top" src="https://i.ytimg.com/vi/<?echo $board['vSrc']?>/0.jpg" alt=""></a>
            	<p style="text-align:center; margin-top:10px; margin-bottom:0px;">
              	<a href="./Vboard/ReadVlog.php?vno=<? echo $board['vIdx']?>"><?echo $Title?></a>
            	</p>
            	<p style="text-align:center;">조회수 : <?echo $board['vView']?> | 날짜 : <?echo $board['vDate']?></p>
        	</div>
      	</div>
				<? } ?>
					<div id="page_num">
						<ul>
							<?
							if($page <= 1)
			 				{ //만약 page가 1보다 크거나 같다면 빈값
			 				}
			 				for($i=$block_start; $i<=$block_end; $i++){
			 					//for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
			 					if($page == $i){ //만약 page가 $i와 같다면
			 						echo "<span class='fo_re'>[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
			 					}else{
			 						echo "<span><a href='?page=$i'>[$i]</a></span>"; //아니라면 $i
			 					}
			 				}
			 				if($block_num >= $total_block)
							{ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
			 				}
							?>
					</ul>
				</div>
				<?
				session_start();
				$getid = $_SESSION['id'];
				$sql3 = mq("select * from air_member where id = '".$getid."'");

				$myid = $sql3->fetch_array();
				?>
				<div id="write_btn">
					<?if($myid['per'] == 2) { ?>
					<a href="./Vboard/WriteVlog.php">
						<button type="submit" class="btn btn-primary submit mb-4">글 쓰기</button></a> <? } else {?>
						<? } ?>
				</div>
			</div>
		</div><!--container -->
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
