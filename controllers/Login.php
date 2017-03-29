<?php
require ("../models/UsersModel.php");

$usersModel = new UsersModel();

$username = $_POST["login"];
$password = $_POST["pass"];

$userData = json_decode($usersModel->verifyUser($username, $password), TRUE);

if (!is_null($userData["user"])) {
	session_start();
	$_SESSION["username"] = $userData["user"];
	$_SESSION["isadmin"] = $userData["isadmin"];
	session_write_close();
	echo json_encode(array("login" => TRUE));
} else {
	echo json_encode(array("login" => FALSE));;
}

?>