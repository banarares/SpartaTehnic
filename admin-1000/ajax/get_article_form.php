<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();
$FormatDate = new FormatDate();
$Categories = new Categories();

$article_id = abs(intval($_REQUEST['article_id']));
$page_no = abs(intval($_REQUEST['page_no']));

$articleInfo = $Articles -> fetch_article_by_id($article_id);

//print_r('<pre>'); print_r($articleInfo); print_r('</pre>');

$smarty->assign('article',$articleInfo);
$smarty->assign('page_no',$page_no);

$where = array();
$where[] = ' AND status = 1';
$categories_list = $Categories -> fetch_categories(false, false,'name','asc', implode(' ', $where));
$smarty->assign('categories_list',$categories_list);

$modal_body =  $smarty->fetch($tpl_folder.'/article-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body, 'parent_title' => $parent_info['name']), true);

/* Return JSON */
die($json_encoded);

//exit;
