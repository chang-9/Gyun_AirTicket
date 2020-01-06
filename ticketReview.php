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

/* 게시판 목록 */
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
#write_btn {
	position: absolute;
	margin-top:20px;
	right: 0;
}
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
#search_box {
	margin-top:30px;
	text-align: center;
}
#search_box2 {
	text-align: center;
	margin-top: 30px;

}
.nse_content{
	width:660px;
	height:500px;
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
		<div class="container">
			<div id="board_area">
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
						$list = 10;
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
								<span style="font-weight:bold; color:blue">[<? echo $rep_count ?>]</span></a></td>
							<td width="120"><?php echo $board['a_nick']; ?></td>
							<td width="100"><?php echo $board['a_ticketDate']; ?></td>
							<td width="100"><?php echo $board['a_ticketViews']; ?></td>
						</tr>
					 </tbody>
				 <?php } ?>
			 </table>
		  <div id="page_num">
			 <?php
 				if($page <= 1)
 				{ //만약 page가 1보다 크거나 같다면 빈값

 				}
 				for($i=$block_start; $i<=$block_end; $i++){
 					//for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
 					if($page == $i){ //만약 page가 $i와 같다면
 						echo "<span class='fo_re'>[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
 					}else{
 						echo "<a href='?page=$i'>[$i]</a>"; //아니라면 $i
 					}
 				}
 				if($block_num >= $total_block)
				{ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
 				}
 			?>
	   </div>
				 <div id="write_btn">
	        <a href="./Review/ReviewWrite.php">
						<button type="submit" class="btn btn-primary submit mb-4">글 쓰기</button></a>
	       </div>

				 <div id="search_box">
					 <form action="./Review/search_result.php" method='get'>
						 <select name="catgo">
							 <option value="a_ticketTitle">제목</option>
							 <option value="a_nick">글쓴이</option>
							 <option value="a_ticketcontent">내용</option>
						 </select>
						 	<input type="text" name="search" size="40" required="required"/>
						 	<button type="submit" class="btn btn-primary submit mb-6">검색</button>
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
