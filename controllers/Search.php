<?php 
require ("../models/GoodsModel.php");
$goodsModel = new GoodsModel();

$name = trim($_GET['name']);
$type = $_GET['type'];
$from = floatval($_GET['from']);
$to = floatval($_GET['to']);

//handle some boundary values
if ($name == "") $name = "%";
if ($from < 0) $from = 0;
if ($to <= 0) $to = $goodsModel->getMaxPrice();

echo $goodsModel->getGoods($name, $type, $from, $to);

?>