<?php

class GoodsModel {

	//get all types of goods
	public function getGoodsTypes () {
		require 'Credentials.php';

		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());

		//set query
		$query = "SELECT DISTINCT goods_type AS type FROM goods";

		//select types and push into array
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$types = array();
		while ($row = mysqli_fetch_array($result)) {
    		array_push($types, $row[0]);
		}

		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);
		
		//return results as json
		return json_encode($types, JSON_FORCE_OBJECT);
	}

	//get all goods names
	public function getGoodsNames () {
		require 'Credentials.php';

		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());

		//set query
		$query = "SELECT DISTINCT goods_name FROM goods ORDER BY goods_name";

		//select names and push into array
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$names = array();
		while ($row = mysqli_fetch_array($result)) {
    		array_push($names, $row[0]);
		}

		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);
		
		//return results as json
		return json_encode($names, JSON_FORCE_OBJECT);
	}

	function getMaxPrice() {
		require 'Credentials.php';

		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());

		//set query
		$query = "SELECT MAX(goods_price) FROM goods";

		//select and set max price
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$maxPrice = mysqli_fetch_row($result)[0];
	
		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);
		
		//return max price as float
		return floatval($maxPrice);
	}

	public function getGoods($name, $type, $from, $to) {
		require 'Credentials.php';
		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
		
		//add passed parameters to request
		if (isset($name, $type, $from, $to)) {
			//disable secutiry measures =)
			//$name = mysqli_real_escape_string($connect, $name);
			//$type = mysqli_real_escape_string($connect, $type);
			$query = "SELECT goods_name AS name, goods_type AS type, goods_price AS price FROM goods
						WHERE goods_name LIKE '%$name%'
						AND goods_price BETWEEN $from AND $to
						AND goods_type LIKE '$type'
						ORDER BY goods_name";
		}
				
		//select goods and push into array
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$goods = array();
		while ($row = mysqli_fetch_assoc($result)) {
    		$item = array('name' => $row['name'], 'type' => $row['type'], 'price' => $row['price']);
    		array_push($goods, $item);
		}

		//free result and close connection
		mysqli_free_result($result);
		mysqli_close($connect);
		
		//return result as JSON object
		return json_encode($goods, JSON_FORCE_OBJECT);
	}

	function addToGoods($name, $type, $price) {
		require 'Credentials.php';
		//connect to DB
		$connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());

		//passed passed parameters to request
		if (isset($name, $type, $price)) {
			//disable secutiry measures =)
			//$name = mysqli_real_escape_string($connect, $name);
			//$type = mysqli_real_escape_string($connect, $type);
			$query = "INSERT INTO goods (goods_name, goods_type, goods_price) VALUES ('$name', '$type', $price)";
		}
		
		//add goods
		mysqli_query($connect, $query) or die(mysqli_error($connect));
		
		//close connection
		mysqli_close($connect);
	}
	
}
?>