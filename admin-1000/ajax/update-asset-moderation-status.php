<?php
require('../inc/config.php');

$Assets = new Assets();

$asset_id =  abs(intval($_REQUEST['asset_id']));
$status =  abs(intval($_REQUEST['status']));



$assetInfo = $Assets -> fetch_asset_by_id($asset_id);

$assetInfo['is_moderated'] = $status;

$Assets -> update_asset($assetInfo);

$response = 'ok';
$response = $assetInfo['is_moderated'];

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);
