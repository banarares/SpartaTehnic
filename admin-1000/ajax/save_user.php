<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Users = new Users();
$Sanitation = new Sanitation();

$user_id = abs(intval($_REQUEST['user_id']));

$form_data = array();
$form_data['user_name'] = $Sanitation->remove_html($_REQUEST['user_name_add'], true);
$form_data['status'] =  $Sanitation->remove_html($_REQUEST['status'], true);
$form_data['email'] =  $Sanitation->remove_html($_REQUEST['email_add_user'], true);
$form_data['password'] =  $Sanitation->remove_html($_REQUEST['password_add_user'], true);
$form_data['usergroup_id'] = abs(intval($_REQUEST['usergroup_id']));
$form_data['action_type'] = $Sanitation->remove_html($_REQUEST['action_type']);
$form_data['user_id'] = $Sanitation->remove_html($_REQUEST['user_id'], true);


$validate_form = $Users->validate_user($form_data);

if (empty($validate_form))
{
    if ($user_id > 0)
    {
        $user_id = $Users -> update_user($form_data);
    }
    else
    {
        $user_id = $Users -> add_user($form_data);
    }

    $response = 'ok';

     //
}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('response'=>$response), true);
/* Return JSON */
die($json_encoded);


//exit;
