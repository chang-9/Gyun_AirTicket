<?php
	include "../ticketDb.php";

	$bno = $_GET['tNo'];
	$sql = mq("delete from a_ticketReviews where a_ticketNo='$bno';");

	$maxNo = @mysql_result(mysql_query("select MAX(a_ticketNo)+1 from a_ticketReviews"),0,0);
	$sql = "alter table a_ticketReviews AUTO_INCREMENT=" .$maxNo;
?>

<script type="text/javascript">alert("삭제되었습니다!");
window.location.href="../ticketReview.php"</script>
