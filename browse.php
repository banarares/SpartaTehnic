<?php

require('inc/config.php');

$Assets = new Assets();
$FormatDate = new FormatDate();
$Sanitation = new Sanitation();

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$limit = $config['CT_NUMBER_OF_USERS_PER_PAGE'];

$start = ($page - 1) * $limit;
//var_dump($_REQUEST);

$where = array();
$get_data = array();
$get_data['s_asset_id'] = $Sanitation->remove_html($_REQUEST['s_asset_id'], true);
$get_data['s_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
$get_data['s_file_type'] = $Sanitation->remove_html($_REQUEST['s_file_type'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
$get_data['s_description'] = $Sanitation->remove_html($_REQUEST['s_description'], true);
$get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);
$get_data['filter'] = $Sanitation->remove_html($_REQUEST['filter'], true);
$filter = $Sanitation->remove_html($_REQUEST['filter'], true);



$assets_type =  $Sanitation->remove_html($_REQUEST['type'], true);

$CKEditorFuncNum =  $Sanitation->remove_html($_REQUEST['CKEditorFuncNum'], true);

if ($assets_type == 'images')
{
    $where[] = " AND file_type = 'image' " ;
}
elseif ($assets_type == 'sounds')
{
    $where[] = " AND file_type = 'sound' " ;
}
else
{
    $where[] = " AND file_type <> 'image' " ;
}
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

//print_r('<pre>');print_r($usersList);print_r('</pre>');


$nr_of_page=ceil($total_assets/$limit);

$min_no = $page - $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
$min_page = ($min_no <= 0 )? 1 : $min_no;

$max_no = $page + $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
$max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;


$link_pagination = $admin_asstes_url;
$link_ajax = '';




$selection_input = 'true';

$smarty->assign('selection_input','true');


$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);

$smarty->assign('current_assets', 0);
$smarty->assign('allAssets',$assetsList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);
$smarty->assign('assets_type',$assets_type);

if ($assets_type == 'images')
{
    $pageTitle = "Assets Management for Images";
}
elseif ($assets_type == 'sounds')
{
    $pageTitle = "Assets Management for Audio";
}
else
{
    $pageTitle = "Assets Management for Documents";
}



$smarty->assign('CKEditorFuncNum', $CKEditorFuncNum);
$smarty->assign('pageTitle', $pageTitle);
$smarty->display($tpl_folder.'/assets_list.tpl');

/*

$modal_body =  $smarty->fetch($tpl_folder.'/assets_list.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

die($json_encoded);
*/
?>
