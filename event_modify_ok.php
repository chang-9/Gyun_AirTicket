<?php

include "./ticketDb.php";

$a_eventNo = $_POST['a_eventNo'];

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "./EventImages/".$filename;
move_uploaded_file($tmpfile,$folder);

$sql = mq("update a_Event set a_nick='".$_POST['a_nick']."',a_eventTitle='".$_POST['a_eventTitle']."',a_eventContent='".$_POST['a_eventContent']."' where a_eventNo='".$a_eventNo."'");
?>

<script type="text/javascript">alert("수정이 완료되었습니다!");
window.location.href="Event.php" </script>
