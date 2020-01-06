<?php

include "../ticketDb.php";

$idx = $_POST['mod_idx'];

$sql = mq("update a_ticketReviews set a_nick='".$_POST['a_nick']."',a_ticketTitle='".$_POST['a_ticketTitle']."',a_ticketContent='".$_POST['a_ticketContent']."' where a_ticketNo='".$idx."'");
?>

<script type="text/javascript">alert("수정이 완료되었습니다!");
window.location.href="http://webtesting0001.dothome.co.kr/airticket/Review/ReviewRead.php?tNo=<?echo $idx;?>"</script>
