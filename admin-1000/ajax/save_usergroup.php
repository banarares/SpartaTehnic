<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Actions = new Actions();
$Sanitation = new Sanitation();

$form_data = array();


$form_data['usergroup_id'] = abs(intval($_REQUEST['usergroup_id']));
$form_data['usergroup_name'] = $Sanitation->remove_html($_REQUEST['usergroup_name'], true);
$form_data['usergroup_description'] =  $Sanitation->remove_html($_REQUEST['usergroup_description'], true);
$form_data['usergroup_last_update_by'] =  $Sanitation->remove_html($_SESSION['user_id'], true);
$action_type =  $_REQUEST['action_type'];

$validate_usergroup = $Actions->validate_usergroup($form_data);

if(empty($validate_usergroup))
{

	if(	$form_data['usergroup_id']==0){
		$test = $Actions->add_usergroup($form_data);
		
	}else{
		$test = $Actions->udpate_usergroup($form_data);

	}

}

if($test){
	$response = 'ok';
}
else
{
    $response = implode('', $validate_usergroup);
}

$smarty->assign('action_type', $action_type); 



$json_encoded = json_encode(array('response'=>$response), true);

#header("Location: ".$admin_usergroup_url);
/* Return JSON */
die($json_encoded);

//exit;
