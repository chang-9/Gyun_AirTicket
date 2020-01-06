$(document).ready(function(){
	$("#likeBtn").click(function()
	{
		var olButton = $(this).attr('#likeBtn');
		$.ajax({
			type: 'post',
			url: 'like_comment.php=<?php echo $board["a_ticketNo"]; ?>',
			data: olButton
			dataType: 'html',
			success function(data){
				$(".reply_view").html(data);
			}
		});
	});

	$("#unlikeBtn").click(function()
	{
		var ulButton = $(this).attr('#likeBtn');
		$.ajax({
			type: 'post',
			url: 'unlike_comment.php=<?php echo $board["a_ticketNo"]; ?>',
			data: ulButton
			dataType: 'html',
			success function(data){
				$(".reply_view").html(data);
			}
		});
	});
});
