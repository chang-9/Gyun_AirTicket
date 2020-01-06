<?php
	include "../ticketDb.php";

	$unBtn = $_POST['Unlikeidx'];
	$unCon = $_POST['Unlike_con'];

	$sql = mq("update reply set rep_dislike = rep_dislike + 1 where idx = '".$unBtn."'")
?>

<script type="text/javascript">
window.location.href="http://webtesting0001.dothome.co.kr/airticket/Review/ReviewRead.php?tNo=<?echo $unCon;?>"</script>
