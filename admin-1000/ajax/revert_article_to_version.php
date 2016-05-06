<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();
$Sanitation = new Sanitation();

$action = $_REQUEST['action'];

$form_data = array();
$form_data['action_type']= 'edit';
$form_data['article_id'] = abs(intval($_REQUEST['article_id']));
$form_data['page_no'] = abs(intval($_REQUEST['page_no']));

$articleInfo = $Articles -> fetch_article_by_id($form_data['article_id']);
$version_no = abs(intval($_REQUEST['version_no']));

$form_data['version_1']= $articleInfo['version_'.$version_no];

$article_id = $Articles -> update_article($form_data);
$response = 'ok';




$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
