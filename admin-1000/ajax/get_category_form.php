<?php

require('../inc/config.php');
//require('../inc/functions.php');
$Sanitation = new Sanitation();
$Category = new Categories();

$category_id = abs(intval($_REQUEST['category_id']));
$page_no = abs(intval($_REQUEST['page_no']));
$action_type = $Sanitation->remove_html($_REQUEST['action_type']);

$categoryInfo = $Category -> fetch_category_by_id($category_id);

$smarty->assign('category',$categoryInfo);
$smarty->assign('page_no',$page_no);
$smarty->assign('action_type',$action_type);

$modal_body =  $smarty->fetch($tpl_folder.'/category-form.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
