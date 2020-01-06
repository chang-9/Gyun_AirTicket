$(document).ready(function(){
	$(".re_bt").click(function(){
		var params = $("form").serialize();
				$.ajax({
					type: 'post',
					url: 'reply_ok.php?=<?php echo $board["a_ticketNo"]; ?>',
					data : params,
					dataType : 'html',
					success: function(data){
						$(".reply_view").html(data);
						$("reply_content").val('');
		  		}
			});
		});
});
