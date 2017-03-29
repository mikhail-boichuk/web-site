<?php
session_start();

if (isset($_SESSION["username"], $_SESSION["isadmin"])) {
	unset($_SESSION["username"]);
	unset($_SESSION["isadmin"]);
	header("Location: ../index.php");
}

?>