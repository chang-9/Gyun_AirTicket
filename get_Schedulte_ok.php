<?php

include "./ticketDb.php";
$date = date('Y-m-d'); // 현재 날짜정보를 저장

$sql = mq("insert into a_getScheldule (idx,title,content,date) values('".$_POST['idx']."','".$_POST['title']."','".$_POST['content']."','".$date."')");
// a_getScheldule 데이터베이스에 이름, 제목, 내용, 날짜를 입력
?>

<script type="text/javascript">alert("작성이 완료되었습니다!");
window.location.href="scheduleList.php"</script>