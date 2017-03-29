<?php

$headOptions = "<title>Add comment</title>
				<script type='text/javascript' src='js/addcomment.js'></script>";
$content = "<form class='add-form' id ='send-form'/>
 				<label>
 					Select item to comment:
 					<select class='add-form-select' id='name'></select>
 				</label>
				<label>
					Comment:
					<input class='add-form-input' type='text' id='comment'/>
				</label>
				<input class='add-form-btn' type='button' id='send' value='Send'/>
			</form>";

include 'template.php';

?>