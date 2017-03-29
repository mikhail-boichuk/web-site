<?php

class AuthController
{
	function fillLoginForm ($username) {
		if (!empty($username)) {
			return "User: " . $username . 
					"<div><a href='#' id='logout'>Logout</a></div>";
		}
		return "<label>
				Login:<br/>
				<input class='form-input' type='text' name='username' id='username' required /><br/>
				</label>
				<label>
				Password:<br/>
				<input class='form-input' type='password' name='password' id='password' required /><br/>
				</label>
				<input class='form-button' type='button' id='login' value='Login'/>";
	}
}

?>