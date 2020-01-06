 <?php

include "../ticketDb.php";

$date = date('Y-m-d'); // 현재 날짜정보를 저장

$sql = mq("insert into a_ticketReviews(a_nick,a_ticketTitle,a_ticketContent,a_ticketDate,a_Image) values('".$_POST['a_nick']."','".$_POST['a_ticketTitle']."','".$_POST['a_ticketContent']."','".$date."','".$o_name."')");
// a_ticketReviews 데이터베이스에 이름, 제목, 내용, 날짜를 입력
?>

<script type="text/javascript">alert("작성이 완료되었습니다!");
window.location.href="../ticketReview.php"</script>
