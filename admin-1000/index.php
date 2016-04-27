<?php
require('inc/config.php');

$action = filter_var($_GET ['action'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$user_email = filter_var($_REQUEST ['user_email'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$user_password = filter_var($_REQUEST ['user_password'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

if(isset($_REQUEST['amdin_email']) && !empty($_REQUEST['admin_email']))
{
    $form_data_login = array();
    $form_data_login['email']= strip_tags($_REQUEST['admin_email']);
    $form_data_login['password'] = $Sanitation->remove_html($_REQUEST['password'], true);
}

$present = time();
$action = $_REQUEST ['action'];
$user_id =  abs(intval($_REQUEST['user_id']));
//load classes
$login = new loginAdmin();
$Users = new Users();
$Sanitation = new Sanitation();
$FormatDate = new FormatDate();

$this_site = new Site_settings($config['THIS_SITE_ID']);
$css_counter = $this_site->fetch_css_counter();
$smarty->assign('css_counter', $css_counter);
$js_counter = $this_site->fetch_js_counter();
$smarty->assign('js_counter', $js_counter);

if(isset($_REQUEST['usergroup_name']) && !empty($_REQUEST['usergroup_name']))
{
    $usergroup_name = $_REQUEST['usergroup_name'];
    $usergroup_description = $_REQUEST['usergroup_description'];
}

$form_data['user_name'] = $Sanitation->remove_html($_REQUEST['user_name'], true);
$form_data['email'] = $purifier->purify($_REQUEST['email']);
$form_data['user_type'] = $Sanitation->remove_html($_REQUEST['user_type']);
 

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;
$type = $Sanitation->remove_html($_REQUEST['type'], true);

$get_data = array();

$get_data['s_id'] = $Sanitation->remove_html($_REQUEST['s_id'], true);
$get_data['s_description'] = $Sanitation->remove_html($_REQUEST['s_description'], true);
$get_data['s_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
$get_data['s_email'] = $Sanitation->remove_html($_REQUEST['s_email'], true);
$get_data['s_ip'] = $Sanitation->remove_html($_REQUEST['s_ip'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
$get_data['s_type'] = $Sanitation->remove_html($_REQUEST['s_type'], true);
$get_data['s_usergroup'] = $Sanitation->remove_html($_REQUEST['s_usergroup'], true);
$get_data['s_user_id'] = $Sanitation->remove_html($_REQUEST['s_user_id'], true);
$get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);
$get_data['filter'] = $Sanitation->remove_html($_REQUEST['filter'], true);
$filter = $Sanitation->remove_html($_REQUEST['filter'], true);

// Sanitize action;
switch ($action)
{
    //admin default actions
    case 'admin-1000':
    case 'admin-login':
    case 'admin-logout':
    //404 eror page
    case 'show_404':
    //admin section
    case 'admin-users':
    case 'admin-add_admin':
    case 'admin-edit_admin':
    case 'admin-delete_user':
    case 'admin-usergroup':
    case 'admin-add-usergroup':
    case 'admin-update-usergroup':
    case 'admin-delete-usergroup':
    case 'admin-usergroup-actions':
    //admin - actions
    case 'admin-actions':
    //admin - errors
    case 'admin-errors':
    //admin - assets
    case 'admin-assets':
    case 'admin-assets-add':
    case 'admin-assets-edit':
    case 'admin-assets-delete':
    //admin - management
    case 'admin-emails_management':
    //admin - settings
    case 'admin-settings':
    break;
    default:
    $action = 'admin-1000';
}

// Read data for action insert-thread
$smarty->assign('form_data',$form_data);

$is_user_logged_in = $login->check_auth_state();

if (!$is_user_logged_in)
{
    // The user cannot use the admin interface if he/she its not logged in;
    $is_logged = $login->login_user($user_email, $user_password);
    if (!$is_logged)
    {
        $smarty->display($tpl_folder.'/index-admin.tpl');
        exit();
    }
    else
    {
        header("Location: $admin_errors_url");
    }
}

$is_admin = $Users->check_if_user_is_admin($_SESSION['user_id']);
$is_admin = true;
if (!$is_admin)
{
    $login->logout();
    exit();
}
$smarty->assign('SESSION',$_SESSION);

$users_types_list = $Users->fetch_users_types();
$smarty->assign('users_types_list',$users_types_list);
$smarty->assign('is_admin',$is_admin);
$smarty->assign('action',$action);


/* Error State */
if ($action=="show_404")
{
    header('HTTP/1.0 404 Not Found');
    $smarty->assign('error_description', 'Ne pare rau, aceasta discutie nu exista pe Comunitatea HemoStop.<br/>Va recomandam sa utilizati functia de cautare:');
    $smarty->display('index-error.tpl');
    die();
}

/* ADMIN SECTION */
if ($action == 'admin-1000')
{
    if(!$is_admin){
        $smarty->display($tpl_folder.'/index-admin.tpl');
    }else{
        header("Location: ".$admin_errors_url);
    }

}

if ($action == 'admin-actions')
{

        $error_handler = new ErrorHandler();

        $limit = $config['CT__NUMBER_OF_ERRORS_PER_PAGE'];

        $allErrors = $error_handler -> get_all_errors(0, $limit);

        $total_results =  $error_handler->count_all_errors();

        $nr_of_page=1;
        $actions_obj = new Actions();
        $actions_array = $actions_obj->fetch_actions();

        $smarty->assign('actions_array',$actions_array);

        $smarty->assign('s_page',1);
        $smarty->assign('s_page',1);
        $smarty->assign('no_of_page',$nr_of_page);
        $smarty->assign('allErrors',$allErrors);
        $smarty->assign("error", '');
        $smarty->display($tpl_folder.'/admin_actions.tpl');
}

if($action == 'admin-update-usergroup')
{
    header('Location :'. $root_url_admin);
}

if ($action == 'admin-usergroup-actions')
{
        $error_handler = new ErrorHandler();

        $limit = $config['CT__NUMBER_OF_ERRORS_PER_PAGE'];

        $allErrors = $error_handler -> get_all_errors(0, $limit);

        $total_results =  $error_handler->count_all_errors();

        $smarty->assign('allErrors',$allErrors);
        $smarty->assign("error", '');
        $Users = new Users();
        $Actions = new Actions();
        $usergroup_obj = $Actions->fetch_usergroups();
        $actions = $Actions->fetch_usergroup_actions();

        $smarty->assign('user_types', $user_types);
        $smarty->assign('usergroup_obj', $usergroup_obj);
        $smarty->assign('actions', $actions);
        $smarty->assign('next_id', $next_id);

        $smarty->display($tpl_folder.'/admin_usergroup_actions.tpl'); 
}

if ($action == 'admin-add-usergroup')
{

            $data_action_array['usergroup_name'] = $usergroup_name;
            $data_action_array['usergroup_description'] = $usergroup_description;
            $data_action_array['usergroup_last_update_by'] = $_SESSION['user_id'];

            $error_handler = new ErrorHandler();

            $limit = $config['CT__NUMBER_OF_ERRORS_PER_PAGE'];

            $allErrors = $error_handler -> get_all_errors(0, $limit);

            $total_results =  $error_handler->count_all_errors();

            $smarty->assign('allErrors',$allErrors);
            $smarty->assign("error", $error);
            
            $Actions = new Actions();
            $Actions->add_usergroup($data_action_array);

            #$Actions->error_description($data_action_array);

            $user_types = $Users->fetch_users_types();

            $usergroup_obj = $Actions->fetch_usergroups();

            $actions = $Actions->fetch_actions();

            $smarty->assign('user_types', $user_types);
            $smarty->assign('usergroup_obj', $usergroup_obj);
            $smarty->assign('actions', $actions);
            $smarty->display($tpl_folder.'/admin_usergroup.tpl');
}

if ($action == 'admin-usergroup')
{
        $Action = new Actions();
        $Sanitation = new Sanitation();
        $FormatDate = new FormatDate();

        $page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

        $limit = $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];

        $start = ($page - 1) * $limit;
         
        $where = array();

        if ($get_data['s_id'] != '' && $get_data['s_id'] != 'undefined' && $get_data['s_id'] != '0') {
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
         
        $arrow_array= array('arrow_id','arrow_name','arrow_description','arrow_date', '');
        $arrow_idle = 'sprite-down-arrow-idle';
        $arrow_up = 'sprite-up-arrow';
        $arrow_down = 'sprite-down-arrow';

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
                    case 'created_date':
                    $selected_arrow = $arrow_array[3];
                    break;
                    default:
                    $selected_arrow = $arrow_array[0];
                    break;
                }


        $sort = abs(intval($get_data['sort']));


        $smarty->assign('sort',$sort);

        foreach($arrow_array as $arrow)
        {   
            if($selected_arrow == $arrow && !empty($selected_arrow))
            {
                if($sort == 0)
                {
                    $sort_by = 'desc';
                    $smarty->assign($arrow, $arrow_up);
                }
                elseif($sort == 1){
                    $sort_by = 'asc';
                    $smarty->assign($arrow, $arrow_down);    
                }else{
                    $sort_by = 'desc';
                    $smarty->assign($arrow, $arrow_idle);    
                }

            }else{

            $smarty->assign($arrow, $arrow_idle);

            }
        }


        //var_dump($filter);

        if( $filter != '' && $filter != 'undefined'){
            $order_by = $filter;
        }else{
            $order_by = 'usergroup_id';
        }

         
          $Usergroups = $Action -> fetch_usergroups_pagination($start,$limit,$order_by, $sort_by, implode(' ', $where));

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

        $link_pagination = $admin_usergroup_url;

        $link_ajax = '!';

        //print_r('<pre>');print_r($min_page . ' -> '.$max_page);print_r('</pre>');

        $smarty->assign('filter',$filter);
        $smarty->assign('page_no',$page);
        $smarty->assign('no_of_page',$nr_of_page);
        $smarty->assign('type',$type);
        $smarty->assign('current_thread', 0);
        $smarty->assign('usergroup_obj', $usergroupList);
        $smarty->assign('link_pagination', $link_pagination);
        $smarty->assign('link_ajax', $link_ajax);
        $smarty->assign('min_page',$min_page);
        $smarty->assign('max_page',$max_page);
 
        $smarty->display($tpl_folder.'/admin_usergroup.tpl');

}

if ($action == 'admin-errors') {

    $error_handler = new ErrorHandler();

    $limit = $config['CT__NUMBER_OF_ERRORS_PER_PAGE'];

    $allErrors = $error_handler -> get_all_errors(0, $limit);

    $total_results =  $error_handler->count_all_errors();
    $nr_of_page=1;


    $smarty->assign('s_page',1);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('allErrors',$allErrors);
    $smarty->assign("error", '');
    $smarty->display($tpl_folder.'/admin_errors.tpl');
}

if ($action == 'admin-login')
{



    $validate_form = $Login -> validate_admin_login($form_data_login);
    if (empty($validate_form))
    {
        $_SESSION['email'] =  $form_data_login['email'] ;
        $_SESSION['user_type'] =  'admin' ;

        $userInfo = $Users -> fetch_user_by_email ($_SESSION['email']);

        //update IP for logged user
        $userInfo = $Users -> fetch_user_by_email($_SESSION['email']);
        $userData = array('user_id'=>$userInfo['user_id'], 'ip_address' => $_SERVER['REMOTE_ADDR']);
        $Users -> update_user($userData);

        header("Location: $admin_errors_url");
    }
    else
    {
        $smarty->assign("error", implode('', $validate_form));
        $smarty->assign("email",$form_data_login['email']) ;
        $smarty->display($tpl_folder.'/index-admin.tpl');
    }

}
if ($action == 'admin-logout')
{

    $login->logout();
}

if ($action == 'admin-delete_user')
{

    $Users -> delete_user($user_id);

    exit();
    //header("Location: $admin_users_url");
}

if ($action == 'admin-users') {


    $Actions = new Actions();
    $usergroup_obj = $Actions->fetch_usergroups();

    $users_types_list = $Users->fetch_users_types();

    $smarty->assign('usergroup_obj',$usergroup_obj);
    $smarty->assign('usergroups',$usergroup_obj);
    $smarty->assign('users_types_list',$users_types_list);

    $FormatDate = new FormatDate();
    $months_list = $FormatDate -> fetch_months();
    $years_list = $FormatDate -> fetch_years();
    $day_list = $FormatDate -> fetch_days();

    $smarty->assign('months_list', $months_list);
    $smarty->assign('years_list', $years_list);
    $smarty->assign('day_list', $day_list);
    
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
            default:          
            $selected_arrow = $arrow_array[0];
            break; 
        }
     

    if( $filter != '' && $filter != 'undefined'){
        $order_by = $filter;
    }else{
        $order_by = 'user_id';
    }

    $sort = abs(intval($_REQUST['sort']));
    $smarty->assign('sort',$sort);


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

    $arrow_idle = 'sprite-down-arrow-idle';
    $arrow_up = 'sprite-up-arrow';
    $arrow_down = 'sprite-down-arrow';

    $allUsersDB = $Users -> fetch_users($start,$limit,'created_date','desc', '');

    $total_users =  $Users -> count_users();

    $allUsers = array();
    foreach ($allUsersDB as $key => $user)
    {
        $usersInfo[$key] = $user;
        $usersInfo[$key]['created_date'] =  $FormatDate -> long_format($user['created_date']);
        
    }

    $smarty->assign('allUsers', $allUsers); 

    $limit = $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $page = 1;

    if ($total_users > 0)
    {
        $nr_of_page=ceil($total_users/$limit);
    }
    else
    {
        $nr_of_page=0;
    }

    $min_no = $page - $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

    $smarty->assign('s_user_id',$get_data['s_user_id']);
    $smarty->assign('s_name',$get_data['s_name']);
    $smarty->assign('s_email',$get_data['s_email']);
    $smarty->assign('s_ip',$get_data['s_ip'] );
    $smarty->assign('s_date_start',$get_data['s_date_start']);
    $smarty->assign('s_date_end',$get_data['s_date_end']);
    $smarty->assign('s_usergroup',$get_data['s_usergroup']);
    
    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type','admin');

    $smarty->assign('current_admins', 1);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);

    $smarty->assign('max_page',$max_page);
    $smarty->assign('allUsers',$allUsers);
    $smarty->assign("error", '');
    $smarty->display($tpl_folder.'/admin_users.tpl');
}


if ($action == 'admin-add_admin') {

    $users_types_list = $Users->fetch_users_types();
    $smarty->assign('users_types_list',$users_types_list);

    $allUsers = $Users -> fetch_admin_users();

    $form_data = array();
    $form_data['user_name'] = $Sanitation->remove_html($_REQUEST['user_name'], true);
    $form_data['email']= strip_tags($_REQUEST['email']);
    $form_data['sex']= strip_tags($_REQUEST['sex']);
    $form_data['password'] = $Sanitation->remove_html($_REQUEST['password'], true);
    $form_data['user_type'] = $Sanitation->remove_html($_REQUEST['user_type'], true);
    $form_data['action_type']= 'add';

    $validate_form = $Users->validate_user_admin($form_data);

    if (empty($validate_form))
    {

        $user_id = $Users -> add_user($form_data);
        $allUsers = $Users -> fetch_admin_users();
        $smarty->assign("error", '');

        header("Location: $admin_users_url");
    }
    else
    {
        $smarty->assign("error", implode('',$validate_form));
        $smarty->assign("form_data", $form_data);
    }


    $allUsers = $Users -> fetch_admin_users(0, $config['CT_NUMBER_OF_USERS_PER_PAGE'],'created_date','desc');

    $total_users =  $Users -> count_users();
    $smarty->assign('allUsers',$allUsers);

    $limit = $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $page = 1;

    if ($total_users > 0)
    {
        $nr_of_page=ceil($total_users/$limit);
    }
    else
    {
        $nr_of_page=0;
    }

    $min_no = $page - $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT_NUMBER_OF_USERS_PER_PAGE'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type','admin');
    $smarty->assign('current_admins', 1);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);
    $smarty->assign('allUsers',$allUsers);
    $smarty->display($tpl_folder.'/admin_users.tpl');
}



if ($action == 'admin-edit_admin') {

    if (!$is_admin) {

        header("Location: $root_url_admin");
        die();
    }

    $users_types_list = $Users->fetch_users_types();
    $smarty->assign('users_types_list',$users_types_list);

    $allUsers = $Users -> fetch_admin_users();

    $form_data = array();
    $form_data['user_name'] = $Sanitation->remove_html($_REQUEST['user_name'], true);
    $form_data['email']= strip_tags($_REQUEST['email']);
    $form_data['sex']= strip_tags($_REQUEST['sex']);
    $form_data['password'] = $Sanitation->remove_html($_REQUEST['password'], true);
    $form_data['user_type'] = $Sanitation->remove_html($_REQUEST['user_type'], true);
    $form_data['action_type']= 'edit';
    $form_data['user_id'] = abs(intval($_REQUEST['user_id']));
    $form_data['page_no'] = abs(intval($_REQUEST['page_no']));

    $validate_form = $Users->validate_user_admin($form_data);

    if (empty($validate_form))
    {

        $user_id = $Users -> update_user($form_data);
        $allUsers = $Users -> fetch_admin_users();
        $smarty->assign("error", '');

        $page_no = $form_data['page_no'];
        header("Location: $admin_users_url#pagina=$page_no");
    }
    else
    {
        $smarty->assign("error", implode('',$validate_form));
        $smarty->assign("form_data", $form_data);
    }
    $smarty->assign('allUsers',$allUsers);
    $smarty->display($tpl_folder.'/admin_users.tpl');
}

if ($action =='admin-assets')
{
    if (!$is_admin)
    {

        header("Location: $root_url_admin");
        die();
    }


    $Assets = new Assets();

    $allAssets = $Assets -> fetch_assets(0, $config['CT_NUMBER_OF_USERS_PER_PAGE'],'created_date','desc');
    $total_assets =  $Assets -> count_assets();

    $limit = $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];
    $page = 1;

    if ($total_assets > 0)
    {
        $nr_of_page=ceil($total_assets/$limit);
    }
    else
    {
        $nr_of_page=0;
    }

    $min_no = $page - $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT_NUMBER_OF_ASSETS_PER_PAGE'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type','admin');
    $smarty->assign('current_assets', 1);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);
    $smarty->assign('allAssets',$allAssets);
    $smarty->assign("error", '');

    $smarty->display($tpl_folder.'/admin_assets.tpl');
}

if ($action =='admin-assets-edit')
{
    if (!$is_admin)
    {
        header("Location: $root_url_admin");
        die();
    }

    $Assets = new Assets();

    $allAssets = $Assets -> fetch_assets();

    $form_data = array();
    $form_data['public_name'] = $Sanitation->remove_html($_REQUEST['public_name'], true);
    $form_data['file_description']= $purifier->purify($_REQUEST['file_description']);
    $form_data['file_type']= $Sanitation->remove_html($_REQUEST['file_type'], true);
    $form_data['action_type']= 'edit';
    $form_data['asset_id'] = abs(intval($_REQUEST['asset_id']));
    $form_data['page_no'] = abs(intval($_REQUEST['page_no']));

    //var_dump($form_data);

    $validate_form = $Assets->validate_asset($form_data);

    if (empty($validate_form))
    {

        $article_id = $Assets -> update_asset($form_data);
        $allAssets = $Assets -> fetch_assets();
        $smarty->assign("error", '');
        $page_no = $form_data['page_no'];

        header("Location: $admin_assets_url#pagina=$page_no");

    }
    else
    {
        $smarty->assign("error", implode('',$validate_form));
        $smarty->assign("form_data", $form_data);
    }
    $smarty->assign('allAssets',$allAssets);
    $smarty->display($tpl_folder.'/admin_assets.tpl');
}

if ($action =='admin-assets-delete')
{
    if (!$is_admin)
    {

        header("Location: $root_url_admin");
        die();
    }

    $Assets = new Assets();

    $asset_id =  abs(intval($_REQUEST['asset_id']));

    $assetInfo = $Assets -> fetch_asset_by_id($asset_id);

    $Assets -> delete_asset($asset_id, $assetInfo['local_file_name']);

    exit();
}

if ($action == 'admin-emails_management')
{

    $page_title = 'Manage the emails management at CMS MS';
    $smarty->assign('page_title', $page_title);

    $limit = $config['CT_NUMBER_OF_EMAILS_PER_PAGE'];
    $page = 1;

    $Email = new emails_management();

    $emails_db = $Email -> fetch_emails_management(0,$limit);
    $total_emails =  $Email -> count_emails_management();

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

    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('current_emails', 1);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);
    $smarty->assign('list_of_emails',$emailsList);
    $smarty->assign("error", '');

    $smarty->display($tpl_folder.'/emails_management.tpl');

}

if ($action =='admin-settings')
{
    if (!$is_admin)
    {

        header("Location: $root_url_admin");
        die();
    }

    $Settings = new Settings();
    $FormatDate = new FormatDate();

      $allSettings_db = $Settings -> fetch_settings(false, false,'setting_name','asc');

    $allSettings = array();
    foreach ($allSettings_db as $key => $setting)
    {
        $allSettings[$key] = $setting;
        $allSettings[$key]['creation_date'] =  $FormatDate -> long_format($setting['creation_date']);
        $allSettings[$key]['last_update_date'] = ($category['last_update_date'] != '0000-00-00 00:00:00')? $FormatDate -> long_format($setting['last_update_date']) : $FormatDate -> long_format($setting['creation_date']);
    }

    $smarty->assign('allSettings',$allSettings);
    $smarty->assign("error", '');

    $smarty->display($tpl_folder.'/admin_settings.tpl');
}