<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Actions = new Actions();

$usergroup_id = abs(intval($_REQUEST['usergroup_id']));
$page_no = abs(intval($_REQUEST['page_no']));


$Users = new Users();
$Actions = new Actions();

#$Actions->error_description($data_action_array);

$usergroup_obj = $Actions->fetch_usergroups();

$usergroup = array();
$usergroup = $Actions->fetch_usergroup_by_id($usergroup_id);
#$usergroup[key($usergroup)]['id'] = key($usergroup);


#$usergroup_actions = $Actions->fetch_usergroup_actions();
 
$actions = $Actions->fetch_actions();
$action_type = $_REQUEST['action_type'];
$smarty->assign('usergroup_obj', $usergroup_obj);
$smarty->assign('usert_type', $usergroup_obj);
$smarty->assign('usergroup', $usergroup);
$smarty->assign('actions', $actions);
$smarty->assign('action_type', $action_type);
$smarty->assign('page_no',$page_no);

$modal_body =  $smarty->fetch($tpl_folder.'/usergroup_form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
