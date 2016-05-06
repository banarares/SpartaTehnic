<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();

$article_id =  abs(intval($_REQUEST['article_id']));
$articleInfo = $Articles -> fetch_article_by_id($article_id);

$Articles -> delete_article($article_id);

$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
