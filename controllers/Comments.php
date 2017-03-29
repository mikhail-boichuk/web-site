<?php
require ("../models/CommentsModel.php");
$commentsModel = new CommentsModel();

$name = trim($_GET['name']);

//handle some boundary values
if ($name == "") $name = "%";

echo $commentsModel->searchComments($name);

?>