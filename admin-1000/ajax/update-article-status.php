<?php

header("Cache-Control: no-cache");
header("Pragma: nocache");

include "../inc/config.php";


// Retrieve the parameters
$action = trim(filter_var($_REQUEST['action'], FILTER_SANITIZE_STRING));
$article_id = intval($_REQUEST['article_id']);
$status = intval($_REQUEST['status']);

// Step1: Sanitization;
switch($action)
{
    case 'update':
        break;

    default:
        report_json_error('Invalid action. Please contact the webmaster.', 1);
}

$Articles = new Articles();
$Articles->update_status($article_id, $status);

$json = array();
$json['error_description'] = '';
$json['return_code'] = 0;
$json['response'] = 'ok';

$encoded_json = json_encode($json);
die($encoded_json);
