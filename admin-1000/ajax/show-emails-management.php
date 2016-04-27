<?php
require('../inc/config.php');
//require('../inc/functions.php');

$Email = new emails_management();
$FormatDate = new FormatDate();


$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;
$type = $_REQUEST['type'];

$limit = $config['CT_NUMBER_OF_EMAILS_PER_PAGE'];

$start = ($page - 1) * $limit;
//var_dump($_REQUEST);

$where = array();

//$Email_list_db = $Email->fetch_open_emails();

    $emails_db = $Email -> fetch_emails_management($start,$limit, implode(' ', $where));
    $total_emails =  $Email -> count_emails_management(implode(' ', $where));

$emailsList = array();
foreach ($emails_db as $key => $emails)
{
    $emailsList[$key] = $emails;
    $emailsList[$key]['creation_date'] =  $FormatDate -> long_format($emails['creation_date']);
    $emailsList[$key]['last_updated_date'] = ($emails['last_updated_date'] != '0000-00-00 00:00:00')? $FormatDate -> long_format($emails['last_updated_date']) : $FormatDate -> long_format($emails['creation_date']);
}

if ($total_emails > 0)
{
    $nr_of_page=ceil($total_emails/$limit);
}
else
{
    $nr_of_page=0;
}

$min_no = $page - $config['CT_NUMBER_OF_EMAILS_PER_PAGE'];
$min_page = ($min_no <= 0 )? 1 : $min_no;

$max_no = $page + $config['CT_NUMBER_OF_EMAILS_PER_PAGE'];
$max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

    $link_pagination = $admin_users_front_url;
    $link_ajax = '';

//print_r('<pre>');print_r($min_page . ' -> '.$max_page);print_r('</pre>');

$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_thread', 0);
$smarty->assign('list_of_emails',$emailsList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);

$smarty->display($tpl_folder.'/emails_management_list.tpl');
