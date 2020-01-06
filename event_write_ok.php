<?php

include "./ticketDb.php";

$date = date('Y-m-d'); // 현재 날짜정보를 저장

$tmpfile = $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "./EventImages/".$filename;
move_uploaded_file($tmpfile,$folder);

$sql = mq("insert into a_Event(a_nick,a_eventTitle,a_eventContent,a_eventDate,a_eventImage) values('".$_POST['a_nick']."','".$_POST['a_eventTitle']."','".$_POST['a_eventContent']."','".$date."','".$o_name."')");
// a_Event 테이블에 이름, 제목, 내용, 날짜를 입력
?>

<script type="text/javascript">alert("글쓰기가 완료되었습니다!");
window.location.href="Event.php" </script>
