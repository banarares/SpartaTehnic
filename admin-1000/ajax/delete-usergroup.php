<?php

require('../inc/config.php');

$Action = new Actions();

$usergroup_id =  abs(intval($_REQUEST['usergroup_id']));


$response = $Action -> delete_usergroup($usergroup_id);

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);