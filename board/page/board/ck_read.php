<?php
include "../../db.php"; /* db load */
?>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
		$("#writepass").dialog({
		 	modal:true,
		 	title:'��б��Դϴ�.',
		 	width:400,
	 	});
	});
</script>
<?php

$bno = $_GET['idx']; /* bno�Լ��� idx���� �޾ƿ� ����*/
$sql = mq("select * from board where idx='".$bno."'"); /* �޾ƿ� idx���� ���� */
$board = $sql->fetch_array();

?>
<div id='writepass'>
	<form action="" method="post">
 		<p>��й�ȣ<input type="password" name="pw_chk" /> <input type="submit" value="Ȯ��" /></p>
 	</form>
</div>
	 <?php
	 	$bpw = $board['pw'];

	 	if(isset($_POST['pw_chk'])) //���� pw_chk POST���� �ִٸ�
	 	{
	 		$pwk = $_POST['pw_chk']; // $pwk������ POST������ ���� pw_chk�� �ֽ��ϴ�.
			if(password_verify($pwk,$bpw)) //�ٽ� if������ DB�� pw�� �Է��Ͽ� �޾ƿ� bpw�� ���� ������ �񱳸� �ϰ�
			{
				$pwk == $bpw;
			?>
				<script type="text/javascript">location.replace("read.php?idx=<?php echo $board["idx"]; ?>");</script><!-- pwk�� bpw���� ������ read.php�� ������ -->
			<?php 
			}else{ ?>
				<script type="text/javascript">alert('��й�ȣ�� Ʋ���ϴ�');</script><!--- �ƴϸ� ��й�ȣ�� Ʋ���ٴ� �޽����� �����ݴϴ� -->
			<?php } } ?>