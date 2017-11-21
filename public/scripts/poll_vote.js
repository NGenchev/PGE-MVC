$(function(){
	$('#vote').click(function(e) {
        e.preventDefault();
		var ans = $("input[type='radio'].radioBtnClass:checked").val();
		$.ajax({
			type: "POST",
			url: "public/responses/poll.Response.php",
			data: {answer: ans},
			success: function(data){
				console.log(JSON.parse(data));
				window.location = window.location.href+"#anketka";
				location.reload();
			}
		});
		return false;
	});
});