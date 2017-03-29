$(document).ready(function () {

	$("#add").click(function(){

		var add_name = $("#name").val();
		var add_type = $("#type").val();
		var add_price = $("#price").val();

		//clean form from messages/warnings if exists
		$("#add-form > p").remove();

		//send add request
		$.ajax({
			url: "controllers/AddItem.php",
			type: "POST",
			data: {name: add_name, type: add_type, price: add_price},
			dataType: "json",
			success: function(data) {
				var message = $("<p></p>");
				if (data.added) {
					message = message.text("Following item added: " +
											"Name - " + data.item.name + " ," +
											"Type - " + data.item.type + " ," +
											"Price - " + data.item.price);
				} else {
					message = message.text("Item not added: " + data.reason).css("color", "red");
				}
				$("#add-form").append(message);
			},
			error: function(xhr) {
				alert("Ooops looks like an error: " + xhr.status + ": " + xhr.statusText);
			}
		});
	});
});