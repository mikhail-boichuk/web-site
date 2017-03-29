<?php

$headOptions = "<title>Search Goods</title>
				<script type='text/javascript' src='js/search.js'></script>";

$content = "<form id='search-form' class='srch-form'/>
				<label>
				 	Type:
					<select class='srch-form-slct' id='type'>
	 					<option value='%'>All</option>
	 				</select>
 				</label>
 				<label>
 					Name:
 					<input class='srch-form-input-1' type='search' id='name'/>
 				</label>
				<label>
					From:
					<input class='srch-form-input-2' type='search' id='from' pattern='\d+[\.,]?\d{0,2}'/>
				</label>
				<label>
					To:
					<input class='srch-form-input-2' type='search' id='to' pattern='\d+[\.,]?\d{0,2}'/>
				</label>
				<input class='srch-form-btn' type='button' value='Search'/>
			</form>";

include 'template.php';

?>