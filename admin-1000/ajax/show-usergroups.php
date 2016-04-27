<?php
require('../inc/config.php');
//require('../inc/functions.php');


$Action = new Actions();
$Sanitation = new Sanitation();
$FormatDate = new FormatDate();
//$FormatDate = new FormatDate();


$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$limit = $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];

$start = ($page - 1) * $limit;
 
$where = array();
$get_data = array();

$get_data['s_id'] = abs(intval($_REQUEST['s_id']));
$get_data['s_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
$get_data['s_description'] = $Sanitation->remove_html($_REQUEST['s_description'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
$get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);

if ($get_data['s_id'] != '' && $get_data['s_id'] != 'undefined' && $get_data['s_id'] != '0' ) {
    $where[] = " AND usergroup_id = '".$Sanitation->prepare_for_database($get_data['s_id'])."' " ;
}
if ($get_data['s_name'] != '' && $get_data['s_name'] != 'undefined') {
    $where[] = " AND usergroup_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_name'])."%' " ;
}
if ($get_data['s_description'] != '' && $get_data['s_description'] != 'undefined') {
    $where[] = " AND usergroup_description LIKE '%".$Sanitation->prepare_for_database($get_data['s_description'])."%' " ;
}
if ($get_data['s_date_start'] != '' && $get_data['s_date_start'] != 'undefined') {
    $where[] = " AND creation_date >= '".date("Y-m-d", strtotime($get_data['s_date_start']))." 00:00:00' " ;
}
if ($get_data['s_date_end'] != '' && $get_data['s_date_end'] != 'undefined') {
    $where[] = " AND creation_date <= '".date("Y-m-d", strtotime($get_data['s_date_end']))." 23:59:59' " ;
}


$smarty->assign('s_id',$get_data['s_id']);
$smarty->assign('s_name',$get_data['s_name']);
$smarty->assign('s_description',$get_data['s_description']); 
$smarty->assign('s_date_start',$get_data['s_date_start']);
$smarty->assign('s_date_end',$get_data['s_date_end']);

$filter = $Sanitation->remove_html($_REQUEST['filter'], true);

$arrow_array= array('arrow_id','arrow_name','arrow_description','arrow_date','');


        switch ($filter)
        {
            case 'usergroup_id':
            $selected_arrow = $arrow_array[0];
            break;
            case 'usergroup_name':
            $selected_arrow = $arrow_array[1];
            break;
            case 'usergroup_description':
            $selected_arrow = $arrow_array[2];
            break;
            case 'create_date':
            $selected_arrow = $arrow_array[3];
            $filter = 'creation_date';
            break;
            
            case 'undefined':
            default:
            $selected_arrow = $arrow_array[0];
            break;
        }

#var_dump($selected_arrow);

$arrow_idle = 'sprite-down-arrow-idle';
$arrow_up = 'sprite-up-arrow';
$arrow_down = 'sprite-down-arrow';

#$selected_arrow = $arrow_array[0];
#var_dump($selected_arrow);
$sort = abs(intval($get_data['sort']));
//var_dump($sort);


foreach($arrow_array as $arrow)
{   
    if($selected_arrow == $arrow && !empty($selected_arrow))
    {   
  
        if($sort == 0)
        {
            $sort_by = 'desc';
            $smarty->assign($arrow, $arrow_down);
        }
        else{
            $sort_by = 'asc';
            $smarty->assign($arrow, $arrow_up);  
        }

    }else{
        
    $smarty->assign($arrow, $arrow_idle);

    }
}

$smarty->assign('sort',$sort);

if( $filter != '' && $filter != 'undefined'){
    $order_by = $filter;
}else{
    $order_by = 'usergroup_id';
}

  $Usergroups = $Action -> fetch_usergroups_pagination($start, $limit, $order_by, $sort_by, implode(' ', $where));

  $total_usergroups =  $Action -> count_usergroups_pagination(implode(' ', $where));

$usergroupList = array();

foreach ($Usergroups as $key => $usergroup_in)
{
    $usergroupList[$key] = $usergroup_in;
   
}
 
if ($total_usergroups > 0)
{
    $nr_of_page=ceil($total_usergroups/$limit);
}
else
{
    $nr_of_page=1;
}

$min_no = $page - $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];
$min_page = ($min_no <= 0 )? 1 : $min_no;

$max_no = $page + $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];
$max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

//$link_pagination = $admin_usergroup_url;

if ($type == 'admin')
{
    $link_pagination = $admin_usergroup_url;
    $link_ajax = '!';
}
else
{
    $link_pagination = $admin_usergroup_url;
    $link_ajax = '';
}

$smarty->assign('filter',$filter);
$smarty->assign('page_id',$page);
$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_thread', 0);
$smarty->assign('usergroup_obj',$usergroupList);

$smarty->assign('link_pagination', $link_pagination);

$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);

$smarty->display($tpl_folder.'/usergroup_list.tpl');
