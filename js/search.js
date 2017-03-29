$(document).ready(function () {

//insert types into search form
insertTypes();

//search button listener
$(".srch-form-btn").click(function() {
	var srch_name = $("#name").val();
	var srch_type = $("#type").val();
	var srch_from = $("#from").val();
	var srch_to = $("#to").val();

	//send search request
	$.ajax({
		url: "controllers/Search.php",
		type: "GET",
		data: {name: srch_name, type: srch_type, from: srch_from, to: srch_to},
		dataType: "json",
		success: function(data) {
			printResult(data);
		},
		error: function(xhr) {
			alert("Ooops looks like an error: " + xhr.status + ": " + xhr.statusText);
		}
	});
});
});

function printResult(data) {
//clean page content from previous results if exists
$("#warning").remove();
$("#result-container").remove();

if (!$.isEmptyObject(data)) {
	//create result table with headers
	$(".page-content").append("<table id='result-container' class='result-table'><tr><th>Name</th><th>Type</th><th>Price</th></tr></table>");

	$.each(data, function(index, item) {
		//add table row	
		$("#result-container").append("<tr></tr>");
		//add columns to row
		$.each(item, function(key, val) {
			var col = $("<td></td>").text(val);
			$("#result-container tr").last().append(col);
		});
	});
} else {
	$(".page-content").append($("<p id = 'warning'></p>").text("Sorry, nothing matches your request..."));
}
}

function insertTypes() {
	//get types from server
	$.get("controllers/GoodsTypes.php", function(data) {
			//insert options
			$.each(data, function(index, val) {
				var type = "<option value='" + val + "'>" + val + "</option>";
				$("#type").append(type);
			});
	}, "json");
}

