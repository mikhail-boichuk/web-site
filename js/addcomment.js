$(document).ready(function () {

insertNames();

$("#send").click(function () {
	
	var item_name = $("#name").val();
	var item_comment = $("#comment").val();

	//clean form from messages/warnings if exists
	$("#send-form > p").remove();

	$.ajax({
		url: "controllers/AddComment.php",
		type: "POST",
		data: {name: item_name, comment: item_comment},
		dataType: "json",
		success: function(data) {
			var message = $("<p></p>").text(data.text);
			if (!data.added) {
				message = message.css("color", "red");
			}
			$("#send-form").append(message);
		},
		error: function(xhr) {
			alert("Ooops looks like an error: " + xhr.status + ": " + xhr.statusText);
		}
	});

});
});

function insertNames() {
	//get types from server
	$.get("controllers/GoodsNames.php", function(data) {
			//insert options
			$.each(data, function(index, val) {
				var type = "<option value='" + val + "'>" + val + "</option>";
				$("#name").append(type);
			});
	}, "json");
}