<?php

$headOptions = "<title>Add Goods</title>
				<script type='text/javascript' src='js/additem.js'></script>";
$content = "<form class='add-form' id ='add-form'/>
 				<label>
 					Name:
 					<input class='add-form-input' type='text' id='name'/>
 				</label>
				<label>
					Type:
					<input class='add-form-input' type='text' id='type'/>
				</label>
				<label>
					Price:
					<input class='add-form-input' type='text' id='price' pattern='\d+[\.,]?\d{0,2}'/>
				</label>
				<input class='add-form-btn' type='button' id='add' value='Add'/>
			</form>";

include 'template.php';

?>

