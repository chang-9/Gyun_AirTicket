<?php
include "../ticketDb.php";

$rno = $_POST['rno'];
$sql = mq("select * from reply where idx='".$rno."'");
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from a_ticketReviews where a_ticketNo='".$bno."'");
$board = $sql2->fetch_array();

$sql = mq("delete from reply where idx='".$rno."'"); ?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("ReviewRead.php?a_ticketNo=<?php echo $board["a_ticketNo"]; ?>");</script>
