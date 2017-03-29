<?php 
require ("../models/GoodsModel.php");

$goodsModel = new GoodsModel();

echo $goodsModel->getGoodsNames();

?>