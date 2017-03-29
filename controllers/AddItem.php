<?php
require ("../models/GoodsModel.php");
$goodsModel = new GoodsModel();

$name = strtolower(trim($_POST['name']));
$type = strtolower(trim($_POST['type']));
$price = floatval($_POST['price']);

$result["added"] = FALSE;

//exit if one of parameters is empty
if (empty($name) || empty($type) || empty($price)) {
	$result["reason"] = "One or more fields are empty";
	echo json_encode($result);
	exit;
}

//check for names matches
$db_names = json_decode($goodsModel->getGoodsNames(), JSON_OBJECT_AS_ARRAY);
foreach ($db_names as $db_name) {
	if (strcasecmp($db_name, $name) == 0) {
		$result["reason"] = "Item already exists";
		echo json_encode($result);
		exit;
	}
}

//chek for existing types
$db_types = json_decode($goodsModel->getGoodsTypes(), JSON_OBJECT_AS_ARRAY);
foreach ($db_types as $db_type) {
	if (strcasecmp($db_type, $type) == 0) {
		$type = $db_type;
	}
}

$goodsModel->addToGoods($name, $type, $price);
$result["added"] = TRUE;
$result["item"] = array("name" => $name, "type" => $type, "price" => $price);

echo json_encode($result);

?>