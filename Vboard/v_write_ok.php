<?php

include "../ticketDb.php";

$date = date('Y-m-d'); // 현재 날짜정보를 저장

$sql = mq("insert into Vlog(vNick,vTitle,vContent,vDate,vSrc) values('".$_POST['vNick']."','".$_POST['vTitle']."','".$_POST['vContent']."','".$date."','".$_POST['vSrc']."')");

// a_ticketReviews 데이터베이스에 이름, 제목, 내용, 날짜를 입력
?>

<script type="text/javascript">alert("작성이 완료되었습니다!");
window.location.href="../Vlog.php"</script>
