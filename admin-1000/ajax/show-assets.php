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



if ($get_data['s_asset_id'] != '' && $get_data['s_asset_id'] != '0') {
    $where[] = " AND asset_id = ".$Sanitation->prepare_for_database($get_data['s_asset_id'])." " ;
    $searched = true;
}
if ($get_data['s_name'] != '') {
    $where[] = " AND public_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_name'])."%' " ;
    $searched = true;
}
if ($get_data['s_description'] != '') {
    $where[] = " AND file_description LIKE '%".$Sanitation->prepare_for_database($get_data['s_description'])."%' " ;
    $searched = true;
}
if ($get_data['s_file_type'] != '' && $get_data['s_file_type'] != 'undefined') {
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


//var_dump($where);
 
$smarty->assign('s_description',$get_data['s_description']);
$smarty->assign('s_name',$get_data['s_name']);
$smarty->assign('s_file_type',$get_data['s_file_type']);
$smarty->assign('s_date_start',$get_data['s_date_start']);
$smarty->assign('s_date_end',$get_data['s_date_end']);

// SORT BY FILTER NAME 0 or 1 -> DESC or ASC

$arrow_array= array('arrow_id','arrow_name','arrow_type','arrow_size','','arrow_description','arrow_date', '');


        switch ($filter)
        {
            case 'asset_id':
            $selected_arrow = $arrow_array[0];
            break;
            case 'public_name':
            $selected_arrow = $arrow_array[1];
            break;
            case 'file_type':
            $selected_arrow = $arrow_array[2];
            break;
            case 'file_size':
            $selected_arrow = $arrow_array[3];
            break;
            case 'image_width':
            $selected_arrow = $arrow_array[4];
            break;
            case 'file_description':
            $selected_arrow = $arrow_array[5];
            break;
            case 'creation_date':
            $selected_arrow = $arrow_array[6];        
            break;
            case 'undefined':
            case '':
            default:
            $selected_arrow = $arrow_array[0];
            break;
        }



$arrow_idle = 'sprite-down-arrow-idle';
$arrow_up = 'sprite-up-arrow';
$arrow_down = 'sprite-down-arrow';

#$selected_arrow = $arrow_array[0];
//var_dump($selected_arrow);
$sort = abs(intval($get_data['sort']));

foreach($arrow_array as $arrow)
{   
    if($selected_arrow == $arrow && !empty($selected_arrow))
    {   

        if($sort == 0)
        {
            $sort_by = 'desc';
            $smarty->assign($arrow, $arrow_down);
        }
        elseif($sort == 1){
            $sort_by = 'asc';
            $smarty->assign($arrow, $arrow_up);    
        }else{
            $sort_by = 'desc';
            $smarty->assign($arrow, $arrow_down);  
        }

    }else{
        
    $smarty->assign($arrow, $arrow_idle);

    }
}

if( $filter != '' && $filter != 'undefined' && $filter != 'file_type' && $filter != 'image_width'){
    $order_by = $filter;
}elseif( $filter == 'image_width'){
    $order_by = 'image_width, image_height';
}elseif( $filter == 'file_type'){
    $order_by = 'file_extenesion, file_type';
}else{      
    $order_by = 'asset_id';
}

$smarty->assign('sort',$sort);
$smarty->assign('filter',$filter);

// END SORT FILTER

$source = $Sanitation->remove_html($_REQUEST['source'], true);
$ckeditor_v = $Sanitation->remove_html($_REQUEST['CKEditor'], true);


if($source=='non_ckeditor' )
{
$smarty->assign('selection_input','true');
$where[] = " AND is_moderated=1";

}elseif($source =='ckeditor'){

$smarty->assign('selection_input','true');
$where[] = " AND is_moderated=1";   
$smarty->assign('source',$source);
}


$assets_db = $Assets -> fetch_assets($start,$limit,$order_by,$sort_by, implode(' ', $where));
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




$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_assets', 0);
$smarty->assign('allAssets',$assetsList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);

$smarty->assign('CKEditorFuncNum', $CKEditorFuncNum);
$smarty->assign('pageTitle', $pageTitle);
$smarty->display($tpl_folder.'/assets_list.tpl');
