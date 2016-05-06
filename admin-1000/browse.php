<?php

require('inc/config.php');


    $Assets = new Assets();
    $FormatDate = new FormatDate();
    $Sanitation = new Sanitation();

    $page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

    $limit = $config['CT_NUMBER_OF_USERS_PER_PAGE'];

    $start = ($page - 1) * $limit;

    $where = array();
    $get_data = array();
    $get_data['s_asset_id'] = $Sanitation->remove_html($_REQUEST['s_asset_id'], true);
    $get_data['s_public_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
    $get_data['s_file_type'] = $Sanitation->remove_html($_REQUEST['s_file_type'], true);
    $get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
    $get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
    $get_data['s_description'] = $Sanitation->remove_html($_REQUEST['s_description'], true);
    $get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);
    $get_data['filter'] = $Sanitation->remove_html($_REQUEST['filter'], true);
    $filter = $Sanitation->remove_html($_REQUEST['filter'], true);
    $assets_type =  $Sanitation->remove_html($_REQUEST['type'], true);
    $CKEditorFuncNum =  $Sanitation->remove_html($_REQUEST['CKEditorFuncNum'], true);
    $source =  $Sanitation->remove_html($_REQUEST['source'], true);

    $where[] = " AND is_moderated = 1 " ;

    if ($get_data['s_asset_id'] != '') {
        $where[] = " AND asset_id = ".$Sanitation->prepare_for_database($get_data['s_asset_id'])." " ;
        $searched = true;
    } 
    if ($get_data['s_description'] != '') {
        $where[] = " AND file_description LIKE '%".$Sanitation->prepare_for_database($get_data['s_description'])."%' " ;
        $searched = true;
    }

    if ($get_data['s_public_name'] != '') {
        $where[] = " AND public_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_public_name'])."%' " ;
        $searched = true;
    }


    if ($get_data['s_file_type'] != '') {
        $where[] = " AND file_type = '".$Sanitation->prepare_for_database($get_data['s_file_type'])."' " ;
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
 
    $smarty->assign('searched',$searched);
    $smarty->assign('s_name',$get_data['s_public_name']);
    $smarty->assign('s_description',$get_data['s_description']);
    $smarty->assign('s_asset_id',$get_data['s_asset_id']);
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
    #var_dump($selected_arrow);
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

    $allAssets = $Assets -> fetch_assets(0, $config['CT_NUMBER_OF_ASSETS_PER_PAGE'],$order_by,$sort_by, implode(' ', $where));
    $total_assets =  $Assets -> count_assets(implode(' ', $where));


    $assetsList = array();    
    foreach ($allAssets as $key => $asset)
    {
        $assetsList[$key] = $asset;
        $assetsList[$key]['creation_date'] =  $FormatDate -> long_format($asset['creation_date']);
        $assetsList[$key]['last_updated_date'] =  $FormatDate -> long_format($asset['last_updated_date']);
    }   

    
    $page = 1;

    if ($total_assets > 0)
    {
        $nr_of_page=ceil($total_assets/$limit);
    }
    else
    {
        $nr_of_page=0;
    }



    $min_no = $page - $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;


    $link_pagination = $admin_assets_url;
    $link_ajax = '';
    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type','admin');
    $smarty->assign('current_assets', 1);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);
    $smarty->assign('allAssets',$allAssets);
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
$smarty->assign('source', $source);
$smarty->assign('pageTitle', $pageTitle);
$smarty->display($tpl_folder.'/assets_list_browser.tpl');

/*

$modal_body =  $smarty->fetch($tpl_folder.'/assets_list.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

die($json_encoded);
*/
?>
