<?php
	include "../ticketDb.php";

	$lBtn = $_POST['Likeidx'];
	$lCon = $_POST['Like_con'];

	$sql = mq("update reply set rep_like = rep_like + 1 where idx = '".$lBtn."'")
?>

<script type="text/javascript">
window.location.href="http://webtesting0001.dothome.co.kr/airticket/Review/ReviewRead.php?tNo=<?echo $lCon;?>"</script>
