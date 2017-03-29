$(document).ready(function () {
	
	$(".srch-form-btn").click(function() { 
		var srch_name = $("#goods-name").val();

		//remove comments/warnings from previos search
		$("#comments-wrapper").remove();
		$("#warning").remove();

		//send search request
		$.ajax({
		url: "controllers/Comments.php",
		type: "GET",
		data: {name: srch_name},
		dataType: "json",
		success: function(data) {
			printComments(data);
		},
		error: function(xhr) {
			alert("Ooops looks like an error: " + xhr.status + ": " + xhr.statusText);
		}
	});

	});
});

function printComments(data) {
		if (!$.isEmptyObject(data)) {
		$(".page-content").append("<div id='comments-wrapper'></div>");
		$.each(data, function(index, comment) {
			$("#comments-wrapper").append("<div></div>");
			//get last comment item
			var item = $("#comments-wrapper > div").last();
			item.append($("<p></p>").text("Item name: '" + comment.name + "'"));
			item.append($("<p></p>").text("From: " + comment.user));
			item.append($("<p></p>").text("Comment: '" + comment.comment + "'"));	
		});
		} else {
			$(".page-content").append($("<p id = 'warning'></p>").text("Sorry, no comments for this item..."));
		}
}