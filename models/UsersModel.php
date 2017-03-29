<?php 

class UsersModel {

	function verifyUser ($username, $password) {
		require 'Credentials.php';
		
		//set query
		$query = "SELECT username, admin, password FROM users
					WHERE username = '$username'";
		
		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
		
		//send request
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

		$userData = ["user" => NULL, "isadmin" => 0];

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				$userData = ["user" => $row["username"], "isadmin" => $row["admin"]];
			}
		}
		
		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);

		return json_encode($userData);
	}

}
?>