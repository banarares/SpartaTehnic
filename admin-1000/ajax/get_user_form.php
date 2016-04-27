<?php

require('../inc/config.php');
//require('../inc/functions.php');

$User = new Users();

$user_id = abs(intval($_REQUEST['user_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$userInfo = $User -> fetch_user_by_id($user_id);

$Action = new Actions();
$usergroups = $Action->fetch_usergroups();

$smarty->assign('user',$userInfo);
$smarty->assign('page_no',$page_no);
$smarty->assign('usergroups',$usergroups);

$modal_body =  $smarty->fetch($tpl_folder.'/users-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;