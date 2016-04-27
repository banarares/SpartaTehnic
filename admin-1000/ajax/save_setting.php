<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Settings = new Settings();
$Sanitation = new Sanitation();

$setting_id = abs(intval($_REQUEST['setting_id']));

$form_data = array();
$form_data['setting_name'] = $Sanitation->remove_html($_REQUEST['setting_name'], true);
$form_data['setting_value'] = $Sanitation->remove_html($_REQUEST['setting_value'], true);
$form_data['setting_id'] = abs(intval($_REQUEST['setting_id']));

//var_dump($form_data);

$validate_form = $Settings->validate_setting($form_data);

if (empty($validate_form))
{
    if ($setting_id > 0)
    {
        $setting_id = $Settings -> update_setting($form_data);
    }
    else
    {
        $setting_id = $Settings -> add_setting($form_data);
    }

    $response = 'ok';

    // header("Location: $admin_settings_front_url");
}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
