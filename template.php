<?php
session_start();

if (!isset($_SESSION["username"]) && strpos($headOptions, "Home page") === FALSE) {
	header("Location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" content="text/html">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/Stylesheet.css" />
		<?php echo $headOptions; ?>	
	</head>
	<body>

		<div class="banner">

			<nav class="navigation">
				<ul class="nav">
					<li><a href="index.php">Home</a></li>
					<?php
					if (isset($_SESSION["username"])) {
						echo "<li><a href='searchgoods.php'>Search goods</a></li>";
						if ($_SESSION["isadmin"] == 1) {
							echo "<li><a href='addgoods.php'>Add goods</a></li>";
						} 
						echo "<li><a href='goodscomments.php'>Comments</a></li>
							<li><a href='addcomment.php'>Add comment</a></li>";
					}
					?>
				</ul>
			</nav>

		</div>
			
		<div class="wrapper">
			<main class="main">
				<div class="page-content">
					<?php echo $content; ?>
				</div>
				
				<div class="sidebar">
					<form class='login-form' id='login-form'>
						<?php 
							require("controllers/AuthController.php");
							$authController = new AuthController();
							if (isset($_SESSION["username"])) { 
								echo $authController->fillLoginForm($_SESSION["username"]);
							}
							else { echo $authController->fillLoginForm(""); }
						?>
					</form>
					<script type="text/javascript" src="js/login.js"></script>
				</div>
			</main>
		</div>

		<footer>
			<p>Made by Mikhail. 2017</p>
		</footer>

	</body>
</html>