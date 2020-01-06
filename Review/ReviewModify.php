<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

	<!-- naver smart editor -->
	<script type="text/javascript" src="../SmartEditor/js/HuskyEZCreator.js" charset="utf-8"></script>
	<!-- naver smart editor -->

	<script>
	function chkValue()	{
		var title = document.write_form.a_ticketTitle.value.replace(/\s|　/gi, '');
		var nick = document.write_form.a_nick.value.replace(/\s|　/gi, '');
		var content = document.write_form.a_ticketContent.value.replace(/\s|　/gi, '');

		if(title == ''){
			alert('제목을 입력해주세요');
			document.a_ticketTitle.focus();
			return false;
		}
		else if(nick == ''){
			alert('닉네임을 입력해주세요');
			document.a_nick.focus();
			return false;
		}
		else if(content == ''){
			alert('내용을 입력해주세요');
			document.a_ticketcontent.focus();
			return false;
		}
		else {
			document.write_form.submit();
		}
	}
	</script>

	<script type="text/javascript">
		var oEditors = [];
		$(function(){
				nhn.husky.EZCreator.createInIFrame({
						oAppRef: oEditors,
						elPlaceHolder: "a_ticketContent", //textarea에서 지정한 id와 일치해야 합니다.
						//SmartEditor2Skin.html 파일이 존재하는 경로
						sSkinURI: "../SmartEditor/SmartEditor2Skin.html",
						htParams : {
								// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
								bUseToolbar : true,
								// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
								bUseVerticalResizer : true,
								// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
								bUseModeChanger : true,
								fOnBeforeUnload : function(){
								}
						},
						fOnAppLoad : function(){
								//기존 저장된 내용의 text 내용을 에디터상에 뿌려주고자 할때 사용
								oEditors.getById["a_ticketContent"].exec("PASTE_HTML" [""]);
						},
						fCreator: "createSEditor2"
				});

				//저장버튼 클릭시 form 전송
				$("#save_btn").click(function(){
						oEditors.getById["a_ticketContent"].exec("UPDATE_CONTENTS_FIELD", []);
						chkValue();
				});
		});
	</script>

	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<link href="../css/simpleLightbox.css" rel='stylesheet' type='text/css' />
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
		<div class="Review_Modify">
		 <h3 class="tittle">Ticket Review</h3>
	  	<?php
		  $bno = $_GET['tNo']; //bno 변수에 해당 게시글의 a_ticketNo를 저장
		  $sql = mq("select * from a_ticketReviews where a_ticketNo='$bno';"); // sql변수로 a_ticketREviews 테이블에서 a_ticetNo가 bno에 해당하는 모든값을 가져옴
		  $board = $sql->fetch_array(); // 결과를 board에 넣음
		  ?>
		 <div class="container">
			 <div id="write_area">
				 <form name="write_form" action="modify_ok.php" method="post">
					 <input type="hidden" id="mod_idx" name="mod_idx" value="<?echo $board['a_ticketNo'];?>"></input>
					 <input class="form-control" type="text" id="a_ticketTitle" name="a_ticketTitle" placeholder="제목" required="" value="<? echo $board["a_ticketTitle"]; ?>"></input>
					 <input class="form-control" type="text" id="a_nick" name="a_nick" placeholder="글쓴이" required="" readonly="readoonly" value="<? echo $board["a_nick"]; ?>"></input>
					 <textarea class="nse_content" id="a_ticketContent" name="a_ticketContent" required=""><?php echo $board['a_ticketContent']; ?></textarea>
         <div class="bt_se">
           	<input type="button" class="btn btn-primary submit mb-4" id="save_btn" value="수정하기"/>

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
