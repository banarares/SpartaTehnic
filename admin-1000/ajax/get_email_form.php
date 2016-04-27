<?php

require('../inc/config.php');
//require('../inc/functions.php');

$email_management_id = abs(intval($_REQUEST['email_management_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$emailInfo = array();
if ($email_management_id > 0)
{
    $Email = new emails_management();

    $emailInfo = $Email -> fetch_email_management_by_id($email_management_id);
}
$smarty->assign('emailInfo',$emailInfo);
$smarty->assign('page_no',$page_no);

$modal_body =  $smarty->fetch($tpl_folder.'/email-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
