<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include "../ticketDb.php";
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

	<!--댓글 CSS 불러오기 -->
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/common2.js"></script>
  <!--댓글 CSS 불러오기끝 -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.0.min.js" ></script>

	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<link href="../css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
	<style>
  * {
	margin: 7 auto;
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
	#log_read {
 	width:900px;
 	position: relative;
 	word-break:break-all;
 }
 #log_title {
	 font-size: 28px;
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
 .reply_view {
	width:85%;
	margin-top:100px;
	word-break:break-all;
}
.dap_lo {
	font-size: 14px;
	padding:10px 0 15px 0;
	border-bottom: solid 1px gray;
}
.dap_to {
	margin-top:5px;
}
.rep_me {
	font-size:12px;
}
.rep_me ul li {
	float:left;
	width: 30px;
}
.dat_delete {
	display: none;
}
.dat_edit {
	display:none;
}
.dap_sm {
	position: absolute;
	top: 10px;
}
.dap_edit_t{
	width:520px;
	height:70px;
	position: absolute;
	top: 40px;
}
.re_mo_bt {
	position: absolute;
	top:40px;
	right: 5px;
	width: 90px;
	height: 72px;
}
.re_content {
	width:80%;
	height: 56px;
}
.dap_ins {
	margin-top:50px;
}
.re_bt {
	position: absolute;
	width:100px;
	height:56px;
	font-size:16px;
	margin-left: 0px;
}
#foot_box {
	height: 50px;
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
		<h3 class="tittle">V-LOG</h3>
<!-- 글 불러오기 -->
<section class="banner-bottom">
	<div class="container">

    <?
    $bno = $_GET['vno']; // bno 변수에 해당 게시글의 인덱스를 저장
    $hit = mysqli_fetch_array(mq("select * from Vlog where vIdx = '".$bno."'")); // hit 변수에 vlog 테이블에서 조회수를 가져와서 넣음
    $hit = $hit['vView'] + 1; // hit 변수에 조회수를 가져오고 +1 시킴
    $fet = mq("update Vlog set vView = '".$hit."' where vIdx = '".$bno."'");
    $sql = mq("select * from Vlog where vIdx = '".$bno."'");
    $board = $sql->fetch_array();
    ?>

    <div class="log_read">
      <!-- 제목 출력 -->
      <div id="log_title"><? echo $board["vTitle"]; ?></div>
      <div id="user_info">
        <!-- 이름, 날짜, 조회수 출력 -->
        <?echo $board['vNick'];?> |  <?echo $board['vDate'];?> |  조회: <?echo $board['vView'];?>
        <div id="bo_line"></div>
      </div>
			<iframe width="100%" height="480px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.youtube.com/embed/<?echo $board['vSrc'];?>?controls=1&amp;rel=0&amp;autohide=1"
			allowfullscreen>
			</iframe>
      <div id="bo_content" style="min-height:300px;">
        <!-- 내용 출력 -->
        <?echo nl2br("$board[vContent]");?>
    </div>
    <!-- 목록, 수정, 삭제 -->

    <?
    session_start();
    $getMember = $_SESSION['id'];
    $sql2 = mq("select nick from air_member where id ='".$getMember."'");
    $Myid = $sql2->fetch_array();

    $sql3 = mq("select a_nick from a_ticketReviews where a_ticketNo='".$bno."'");
    $compare = $sql3->fetch_array();
    ?>

    <div id="bo_ser">
      <ul>
        <li><a href="../Vlog.php">[목록으로]</a></li>
      </ul>
    </div>
		<!-- 댓글 불러오기 -->
		<div class="reply_view">
			<p style="font-size: 28px;">댓글목록</p>

			<?php
			$sql6 = mq("select * from Vreply where con_num='".$bno."' order by idx desc");
			while($reply = $sql6->fetch_array()){
			 ?>
			 <div class="dap_lo">
				<div>
					<!-- 추천 아이콘 -->
					<b><?echo $reply['name']?></b>
						<form action="likeBtn.php" name="likeAction" method="post">
								<input type="hidden" id="Likeidx" name="Likeidx" value="<?echo $reply['idx'];?>"></input>
								<input type="hidden" id="Like_con" name="Like_con" value="<?echo $reply['con_num']?>"></input>
								<input type="image" src="../images/rep_like512.png" with="30" height="30" value="submit" onClick="likeSubmit()"/>
								+<?echo $reply['rep_like'];?></form>
					<!-- 비추천 아이콘 -->
								 <form action="unlikeBtn.php" name="unlikeAction" method="post">
									 <input type="hidden" id="Unlikeidx" name="Unlikeidx" value="<?echo $reply['idx'];?>"></input>
									 <input type="hidden" id="Unlike_con" name="Unlike_con" value="<?echo $reply['con_num']?>"></input>
									 <input type="image" src="../images/rep_dislike512.png" with="30" height="30" value="submit" onClick="unlikeSubmit()"/>
									 -<?echo $reply['rep_dislike'];?></form>
				</div>
			 	<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
				<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
				<div class="rep_me rep_menu">
					<a class="dat_edit_bt" href="">수정</a>
					<a class="dat_delete_bt" href="">삭제</a>
				</div>
				<!-- 댓글 수정 폼 dialog -->
				<div class="dat_edit">
					<form action="./rep_modify_ok.php" method="post">
						<input type="hidden" name="rno" value="<? echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<? echo $bno; ?>" />
						<input type="password" name="rno" value="<? echo $reply['idx']; ?>" />
						<textarea name="content" class="dap_edit_t"><? echo $reply['content']; ?></textarea>
						<input type="submit" value="수정하기" class="re_mo_bt">
					</form>
				</div>
				<!-- 댓글 삭제 비밀번호 확인 -->
				<div class="dat_delete">
					<form action="./reply_delete.php" method="post">
						<input type="hidden" name="rno" value="<? echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<? echo $bno; ?>" />
						<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
					</form>
				</div>
		</div>
	<? } ?>

	<!-- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form method="post" class="reply_form">
			<input type="hidden" name="bno" value="<? echo $bno ?>">
	<?
	if(isset($_SESSION['id'])){
	?>
			<input type="text" name="dat_user" id="dat_user" size="15" readonly="readonly" value="<? echo $Myid["nick"]?>">
	<? }
	else{?>
	<input <input type="text" name="dat_user" id="dat_user" size="15" placeholder="닉네임">
	<? } ?>
			<!-- <input type="text" name="dat_pw" id="dat_pw" size="15" placeholder="비밀번호"> -->
			<div style="margin-top:10px;">
				<textarea name="content" class="re_content" required=""></textarea>
			</div>
				<button class="re_bt" type="suid="rep_bt" >댓글 달기</button>
		</form>
	</div>
	</div><!-- 댓글 불러오기 끝 -->
  </div>

  <div id="foot_box"></div>

  <!--.container-->
  </div>
</section>

</body>
</html>
	<!--//main-->
	<!--footer-->
<?$layout -> footer();?>
			<!-- //footer -->
	<!---->

	<!-- js -->
	<script src="../js/jquery-3.2.1.min.js"></script>
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
