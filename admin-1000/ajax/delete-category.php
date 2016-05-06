<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Categories = new Categories();

$category_id =  abs(intval($_REQUEST['category_id']));

$category_delete_response = $Categories -> delete_category($category_id);

if($category_delete_response == true)
{	
	$response = 'ok';
}else{
	$response = "This category is being used by articles";
}

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
