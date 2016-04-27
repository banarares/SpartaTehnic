<?php
require('../inc/config.php');
//require('../inc/functions.php');

$Users = new Users();
$Actions = new Actions();
$FormatDate = new FormatDate();
$Sanitation = new Sanitation();

$users_types_list = $Users->fetch_users_types();

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;
$type = $_REQUEST['type'];

$limit = $config['CT_NUMBER_OF_USERS_PER_PAGE'];

$usergroup_obj =  $Actions -> fetch_usergroups();
$usergroup_array = $usergroup_obj->GetAssoc();
#var_dump($usergroup_array);
$smarty->assign('usergroups', $usergroup_array);

$start = ($page - 1) * $limit;

$where = array();
$get_data = array();

$get_data['s_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
$get_data['s_email'] = $Sanitation->remove_html($_REQUEST['s_email'], true);
$get_data['s_ip'] = $Sanitation->remove_html($_REQUEST['s_ip'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
$get_data['s_type'] = $Sanitation->remove_html($_REQUEST['s_type'], true);
$get_data['s_usergroup'] = $Sanitation->remove_html($_REQUEST['s_usergroup'], true);
$get_data['s_user_id'] = $Sanitation->remove_html($_REQUEST['s_user_id'], true);
$get_data['sort'] = abs(intval($_REQUEST['sort']));
#$get_data['q'] = $Sanitation->remove_html($_REQUEST['q'], true);

if ($get_data['s_user_id'] != '' && $get_data['s_user_id'] != 'undefined' && $get_data['s_user_id'] != 0) {
    $where[] = " AND user_id = '".$Sanitation->prepare_for_database($get_data['s_user_id'])."' " ;
}
if ($get_data['s_name'] != '' && $get_data['s_name'] != 'undefined') {
    $where[] = " AND user_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_name'])."%' " ;
}
if ($get_data['s_name'] != '' && $get_data['s_name'] != 'undefined') {
    $where[] = " AND user_name LIKE '%".$Sanitation->prepare_for_database($get_data['s_name'])."%' " ;
}
if ($get_data['s_email'] != '' && $get_data['s_email'] != 'undefined') {
    $where[] = " AND email LIKE '%".$Sanitation->prepare_for_database($get_data['s_email'])."%' " ;
}
if ($get_data['s_ip'] != '' && $get_data['s_ip'] != 'undefined') {
    $where[] = " AND ip_address LIKE '%".$Sanitation->prepare_for_database($get_data['s_ip'])."%' " ;
}
if ($get_data['s_date_start'] != '' && $get_data['s_date_start'] != 'undefined') {
    $where[] = " AND created_date >= '".date("Y-m-d", strtotime($get_data['s_date_start']))." 00:00:00' " ;
}
if ($get_data['s_date_end'] != '' && $get_data['s_date_end'] != 'undefined') {
    $where[] = " AND created_date <= '".date("Y-m-d", strtotime($get_data['s_date_end']))." 23:59:59' " ;
}
if ($get_data['s_type'] != '' && $get_data['s_type'] != 'undefined') {
    $where[] = " AND user_type = '".$Sanitation->prepare_for_database($get_data['s_type'])."' " ;
}

if ($get_data['s_usergroup'] != 0 && $get_data['s_usergroup'] != 'undefined') {
    $where[] = " AND akiva_users.usergroup_id =".$Sanitation->prepare_for_database($get_data['s_usergroup'])." " ;
}


$smarty->assign('users_types_list',$users_types_list);

$smarty->assign('s_user_id',$get_data['s_user_id']);
$smarty->assign('s_name',$get_data['s_name']);
$smarty->assign('s_email',$get_data['s_email']);
$smarty->assign('s_ip',$get_data['s_ip'] );
$smarty->assign('s_date_start',$get_data['s_date_start']);
$smarty->assign('s_date_end',$get_data['s_date_end']);
$smarty->assign('s_usergroup',$get_data['s_usergroup']); 

$filter = $Sanitation->remove_html($_REQUEST['filter'], true);
$arrow_array= array('arrow_id','arrow_name','arrow_email','arrow_date','arrow_ip','arrow_usergroup', '');


        switch ($filter)
        {
            case 'user_id':
            $selected_arrow = $arrow_array[0];
            break;
            case 'user_name':
            $selected_arrow = $arrow_array[1];
            break;
            case 'email':
            $selected_arrow = $arrow_array[2];
            break;
            case 'created_date':
            $selected_arrow = $arrow_array[3];
            break;
            case 'ip_address':
            $selected_arrow = $arrow_array[4];
            break;
            case 'usergroup_id':
            $selected_arrow = $arrow_array[5];
            break;
            case 'undefined':
            case '':
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



foreach($arrow_array as $arrow)
{   
    if($selected_arrow == $arrow && !empty($selected_arrow))
    {   
        //var_dump($sort);
        //die();
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

if( $filter != '' && $filter != 'undefined'){
    $order_by = $filter;
}else{      
    $order_by = 'user_id';
   
}


$users_db = $Users -> fetch_users($start, $limit, $order_by, $sort_by, implode(' ', $where));
#$where[] = " AND usergroup_id = '1' ";
$total_users =  $Users -> count_users(implode(' ', $where));


$usersList = array();
foreach ($users_db as $key => $user)
{
    $usersList[$key] = $user;
    $usersList[$key]['created_date'] =  $FormatDate -> long_format($user['created_date']);
}

$nr_of_page=ceil($total_users/$limit);

$min_no = $page - $config['CT_NUMBER_OF_USERS_PER_PAGE'];
$min_page = ($min_no <= 0 )? 1 : $min_no;

$max_no = $page + $config['CT_NUMBER_OF_USERS_PER_PAGE'];
$max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

if ($type == 'admin')
{
    $link_pagination = $admin_users_url;
    $link_ajax = '!';
}
else
{
    $link_pagination = $admin_users_front_url;
    $link_ajax = '';
}
//print_r('<pre>');print_r($min_page . ' -> '.$max_page);print_r('</pre>');

$smarty->assign('filter',$filter);

$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_thread', 0);
$smarty->assign('allUsers',$usersList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);
$smarty->assign('sort',$sort);
$smarty->assign('sort_by',$sort_by);
$smarty->assign('page_no',$page);

if ($type == 'admin') {
    $smarty->display($tpl_folder.'/users_list.tpl');
} else {
    $smarty->display($tpl_folder.'/users_front_list.tpl');
}


