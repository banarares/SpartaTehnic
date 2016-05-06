<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Comments = new Comments();
$Sanitation = new Sanitation();

$form_data = array();
$form_data['comment_body'] = $Sanitation->remove_html($_REQUEST['comment_body'], true);
$form_data['full_name'] = $Sanitation->remove_html($_REQUEST['full_name'], true);
$form_data['email'] = $Sanitation->remove_html($_REQUEST['email'], true);
$form_data['action_type']= 'edit';
$form_data['parent_comment_id'] = abs(intval($_REQUEST['parent_comment_id']));
$form_data['is_moderated'] = abs(intval($_REQUEST['is_moderated']));
$form_data['comment_id'] = abs(intval($_REQUEST['comment_id']));

$validate_form = $Comments->validate_comment($form_data);

if (empty($validate_form))
{
    $Comments -> update_comment($form_data);
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
