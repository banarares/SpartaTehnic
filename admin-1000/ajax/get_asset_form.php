<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Asset = new Assets();

$asset_id = abs(intval($_REQUEST['asset_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$assetInfo = $Asset -> fetch_asset_by_id($asset_id);

$smarty->assign('asset',$assetInfo);
$smarty->assign('page_no',$page_no);

$modal_body =  $smarty->fetch($tpl_folder.'/asset-edit-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
