<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Categories = new Categories();
$Sanitation = new Sanitation();

$category_id = abs(intval($_REQUEST['category_id']));

$form_data = array();
$form_data['name'] = $Sanitation->remove_html($_REQUEST['name'], true);
$form_data['status'] = abs(intval($_REQUEST['status']));
$form_data['display_order'] = abs(intval($_REQUEST['display_order']));
$form_data['category_id'] = abs(intval($_REQUEST['category_id']));
$form_data['action_type'] = $Sanitation->remove_html($_REQUEST['action_type']);

//var_dump($form_data);

$validate_form = $Categories->validate_category($form_data);

if (empty($validate_form))
{
    if ($category_id > 0)
    {
        $category_id = $Categories -> update_category($form_data);
    }
    else
    {   
        $category_id = $Categories -> add_category($form_data);
    }

    $response = 'ok';

    // header("Location: $admin_categorys_front_url");
}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
