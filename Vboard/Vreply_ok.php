<?php
	include "../ticketDb.php";

	$date = date('Y-m-d H:i:s');
	$bno = $_POST['bno'];
	// $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
	$sql = mq("insert into Vreply(con_num,name,content,date) values('".$bno."','".$_POST['dat_user']."','".$_POST['content']."','".$date."')");
?>
<script type="text/javascript" src="../js/common2.js"></script>
<script type="text/javascript" src="../js/recommend.js"></script>

<!-- 댓글 불러오기 -->
<div class="reply_view">
	<p style="font-size: 28px;">댓글목록</p>

	<?php
	$sql6 = mq("select * from Vreply where con_num='".$bno."' order by idx desc");
	while($reply = $sql6->fetch_array()){
	 ?>
	 <div class="dap_lo">
		<div>
			<!-- 추천 아이콘 -->
			<b><?echo $reply['name']?></b>
				<form action="likeBtn.php" name="likeAction" method="post">
						<input type="hidden" id="Likeidx" name="Likeidx" value="<?echo $reply['idx'];?>"></input>
						<input type="hidden" id="Like_con" name="Like_con" value="<?echo $reply['con_num']?>"></input>
						<input type="image" src="../images/rep_like512.png" with="30" height="30" value="submit" onClick="likeSubmit()"/>
						+<?echo $reply['rep_like'];?></form>
			<!-- 비추천 아이콘 -->
						 <form action="unlikeBtn.php" name="unlikeAction" method="post">
							 <input type="hidden" id="Unlikeidx" name="Unlikeidx" value="<?echo $reply['idx'];?>"></input>
							 <input type="hidden" id="Unlike_con" name="Unlike_con" value="<?echo $reply['con_num']?>"></input>
							 <input type="image" src="../images/rep_dislike512.png" with="30" height="30" value="submit" onClick="unlikeSubmit()"/>
							 -<?echo $reply['rep_dislike'];?></form>
		</div>
		<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
		<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
		<div class="rep_me rep_menu">
			<a class="dat_edit_bt" href="">수정</a>
			<a class="dat_delete_bt" href="">삭제</a>
		</div>
		<!-- 댓글 수정 폼 dialog -->
		<div class="dat_edit">
			<form action="./rep_modify_ok.php" method="post">
				<input type="hidden" name="rno" value="<? echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<? echo $bno; ?>" />
				<input type="password" name="rno" value="<? echo $reply['idx']; ?>" />
				<textarea name="content" class="dap_edit_t"><? echo $reply['content']; ?></textarea>
				<input type="submit" value="수정하기" class="re_mo_bt">
			</form>
		</div>
		<!-- 댓글 삭제 비밀번호 확인 -->
		<div class="dat_delete">
			<form action="./reply_delete.php" method="post">
				<input type="hidden" name="rno" value="<? echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<? echo $bno; ?>" />
				<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
			</form>
		</div>
</div>
<? } ?>

<!-- 댓글 입력 폼 -->
<div class="dap_ins">
<form method="post" class="reply_form">
	<input type="hidden" name="bno" value="<? echo $bno ?>">
<?
if(isset($_SESSION['id'])){
?>
	<input type="text" name="dat_user" id="dat_user" size="15" readonly="readonly" value="<? echo $Myid["nick"]?>">
<? }
else{?>
<input <input type="text" name="dat_user" id="dat_user" size="15" placeholder="닉네임">
<? } ?>
	<!-- <input type="text" name="dat_pw" id="dat_pw" size="15" placeholder="비밀번호"> -->
	<div style="margin-top:10px;">
		<textarea name="content" class="re_content" required=""></textarea>
	</div>
		<button class="re_bt" type="suid="rep_bt" >댓글 달기</button>
</form>
</div>
</div><!-- 댓글 불러오기 끝 -->
