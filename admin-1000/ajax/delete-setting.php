<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Settings = new Settings();

$setting_id =  abs(intval($_REQUEST['setting_id']));

$Settings -> delete_setting($setting_id);


$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
