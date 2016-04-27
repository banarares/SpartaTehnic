<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Setting = new Settings();

$setting_id = abs(intval($_REQUEST['setting_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$settingInfo = $Setting -> fetch_setting_by_id($setting_id);

$smarty->assign('setting',$settingInfo);
$smarty->assign('page_no',$page_no);

$modal_body =  $smarty->fetch($tpl_folder.'/setting-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
