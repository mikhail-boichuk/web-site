<?php
require ("../models/CommentsModel.php");

$commentsModel = new CommentsModel();

$result["added"] = FALSE;

session_start();
$user = $_SESSION["username"];
$name = strtolower(trim($_POST["name"]));
$comment = trim($_POST["comment"]);

//exit if comment is empty
if (empty($comment)) {
	$result["text"] = "Your comment is empty";
	echo json_encode($result);
	exit;
}

$commentsModel->addComment($name, $user, $comment);

$result["added"] = TRUE;
$result["text"] = "Comment successfully added";

echo json_encode($result);

?>