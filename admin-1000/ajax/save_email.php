<?php

require('../inc/config.php');
//require('../inc/functions.php');

$email_management_id = abs(intval($_REQUEST['email_management_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$form_data = array();
$form_data['full_name'] = strip_tags($_REQUEST['full_name']);
$form_data['email']= strip_tags($_REQUEST['email']);

if ($email_management_id > 0)
{
    $form_data['action_type']= 'edit';
    $form_data['email_management_id'] = $email_management_id;
}
else
{
    $form_data['action_type']= 'add';
}

$Email = new emails_management();

$validate_form = $Email->validate_email_management($form_data);

if (empty($validate_form))
{


    if ($email_management_id > 0)
    {
        $Email -> edit($email_management_id, $form_data['full_name'], $form_data['email']);
    }
    else
    {
        $Email -> add($form_data['full_name'], $form_data['email']);
    }
    $response = 'ok';
}
else
{
    $response = implode('',$validate_form);

}


$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
