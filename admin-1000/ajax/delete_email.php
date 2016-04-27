<?php

header("Cache-Control: no-cache");
header("Pragma: nocache");

include "../inc/config.php";


// Retrieve the parameters
$action = trim(filter_var($_REQUEST['action'], FILTER_SANITIZE_STRING));
$email_management_id = intval($_REQUEST['email_management_id']);


// Step1: Sanitization;
switch($action)
{
    case 'delete':
        break;

    default:
        report_json_error('Invalid action. Please contact the webmaster.', 1);
}

$Email = new emails_management();
$Email->delete($email_management_id);

$json = array();
$json['error_description'] = '';
$json['return_code'] = 0;

$encoded_json = json_encode($json);
die($encoded_json);
