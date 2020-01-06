<?php
   session_start();
   header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

   $db = new mysqli("localhost","webtesting0001","ccit1234#","webtesting0001");
   $db->set_charset("utf8");

   function mq($sql){
      global $db;
      return $db->query($sql);
   }

  //$checkId = $_SESSION['id'];
  $checkPass = $_POST['pass'];

  $sql = mq("select * from air_member where id = '".$checkId."' AND pass = '".$pass."'");
  $sql2 = mq("select * from air_member where id = '".$checkId."'");

  $compare1 = $sql->fetch_array();
  $compare2 = $sql2->fetch_array();

  if($comapre1['id'] == $compare2['id']){
    $sql3 = mq("delete * from air_member where id = '".$checkId."'");
    echo "탈퇴가 완료되었습니다!";

   } else {
    echo "비밀번호가 일치하지 않습니다!";
    return false;
  }
?>
