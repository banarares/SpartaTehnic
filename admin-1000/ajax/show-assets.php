<?php

//var_dump('initial'); die();
require('../inc/config.php');
//require('../inc/functions.php');


$Assets = new Assets();
$FormatDate = new FormatDate();
$Sanitation = new Sanitation();

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$limit = $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];

$start = ($page - 1) * $limit;
//var_dump($_REQUEST);

$where = array();
$get_data = array();
$get_data['s_public_name'] = $Sanitation->remove_html($_REQUEST['s_public_name'], true);
$get_data['s_file_type'] = $Sanitation->remove_html($_REQUEST['s_file_type'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);

if ($get_data['s_public_name'] != '') {
    $where[] = " AND public_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_public_name'])."%' " ;
    $searched = true;
}
if ($get_data['s_file_type'] != '') {
    $where[] = " AND file_type = '".$get_data['s_file_type']."' " ;
    $searched = true;
}

if ($get_data['s_date_start'] != '') {
    $where[] = " AND creation_date >= '".date("Y-m-d", strtotime($get_data['s_date_start']))." 00:00:00' " ;
    $searched = true;
}
if ($get_data['s_date_end'] != '') {
    $where[] = " AND creation_date <= '".date("Y-m-d", strtotime($get_data['s_date_end']))." 23:59:59' " ;
    $searched = true;
}

$smarty->assign('s_public_name',$get_data['s_public_name']);
$smarty->assign('s_file_type',$get_data['s_file_type']);
$smarty->assign('s_date_start',$get_data['s_date_start']);
$smarty->assign('s_date_end',$get_data['s_date_end']);


$assets_db = $Assets -> fetch_assets($start,$limit,'creation_date','desc', implode(' ', $where));
$total_assets =  $Assets -> count_assets(implode(' ', $where));

$assetsList = array();
foreach ($assets_db as $key => $asset)
{
    $assetsList[$key] = $asset;
    $assetsList[$key]['creation_date'] =  $FormatDate -> long_format($asset['creation_date']);
    $assetsList[$key]['last_updated_date'] =  $FormatDate -> long_format($asset['last_updated_date']);
}

$nr_of_page=ceil($total_assets/$limit);

$min_no = $page - $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];
$min_page = ($min_no <= 0 )? 1 : $min_no;

$max_no = $page + $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];
$max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;


    $link_pagination = $admin_asstes_url;
    $link_ajax = '';

//print_r('<pre>');print_r($min_page . ' -> '.$max_page);print_r('</pre>');

$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_assets', 0);
$smarty->assign('allAssets',$assetsList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);


$smarty->display($tpl_folder.'/assets_list.tpl');
