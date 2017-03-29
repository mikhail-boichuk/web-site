$(document).ready(function () {

//login
$("#login").click(function(){
	var username = $("#username").val();
	var password = $("#password").val();

	//clean form from previous alerts
	$("#login-form > p").remove();

	if (username == "" || password == "") {
		$("#username, #password").css("border", "2px solid red");
		$("#login").after($("<p></p>").text("Login or Password is empty").css("color", "red"));
	} else {
		$.post("controllers/Login.php", {login: username, pass: password }, function(data) {
			if (data.login) {
				location.reload(true);
			} else {
				$("#login").after($("<p></p>").text("Login or pass is incorrect!").css("color", "red"));
			}
		}, "json");
	}

});

//logout
$("#logout").click(function(){
	if (confirm("Are you sure?")) {
		window.location.href = "controllers/Logout.php";
	}
});

//clean view form errors
$("#username, #password").click(function() {
	$(this).css("border", "");
	$("#login-form > p").remove();
});

});
