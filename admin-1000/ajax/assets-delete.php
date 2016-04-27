<?php

require('../inc/config.php');

$Assets = new Assets();

$asset_id =  abs(intval($_REQUEST['asset_id']));

$assetInfo = $Assets -> fetch_asset_by_id($asset_id);

$Assets -> delete_asset($asset_id, $assetInfo['local_file_name']);

$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);
