<?php

class CommentsModel
{
	function searchComments($goods_name) {
		require 'Credentials.php';

		//set query
		$query = "SELECT goods_name AS name, comment, username
					FROM goods JOIN comments ON goods.id = comments.goods_id
					WHERE goods_name LIKE '%$goods_name%'
					ORDER BY name";
		
		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
		
		//send request
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		
		$comments = array();

		while ($row = mysqli_fetch_assoc($result)) {
    		$comment= array('name' => $row['name'], 'user' => $row['username'], 'comment' => $row['comment']);
    		array_push($comments, $comment);
		}
		
		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);

		return json_encode($comments, JSON_FORCE_OBJECT);
	}	

	function addComment($name, $username, $comment) {
		require 'Credentials.php';
		//set query
		if (isset($name, $user, $comment)) {
			$query = "INSERT INTO comments (goods_id, username, comment)
					VALUES (
					(SELECT id FROM goods WHERE goods_name = '$name'), 
					'$username',
					'$comment')";
		}
		
		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
		
		//send request
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

		//close connection
		mysqli_close($connect);
	}
}
?>