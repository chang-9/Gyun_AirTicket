<?php
	include "../../db.php";

	$bno = $_POST['bno'];
	$userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
	$sql = mq("insert into reply(con_num,name,pw,content) values('".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
?>
<script type="text/javascript" src="/js/common.js"></script>

	<h3>��۸��</h3>
		<?php
			$sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">����</a>
				<a class="dat_delete_bt" href="#">����</a>
			</div>
			<!-- ��� ���� �� dialog -->
			<div class="dat_edit">
				<form method="post" action="rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="��й�ȣ" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="�����ϱ�" class="re_mo_bt">
				</form>
			</div>
			<!-- ��� ���� ��й�ȣ Ȯ�� -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>��й�ȣ<input type="password" name="pw" /> <input type="submit" value="Ȯ��"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- ��� �Է� �� -->
	<div class="dap_ins">
		<form method="post" class="reply_form">
			<input type="hidden" name="bno" value="<?php echo $bno; ?>">
			<input type="text" name="dat_user" id="dat_user" size="15" placeholder="���̵�">
			<input type="password" name="dat_pw" id="dat_pw" size="15" placeholder="��й�ȣ">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button type="suid="rep_bt" class="re_bt">���</button>
			</div>
		</form>
	</div>