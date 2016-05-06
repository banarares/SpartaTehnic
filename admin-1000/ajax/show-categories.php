<?php
    require('../inc/config.php');

     $Categories = new Categories();
    $FormatDate = new FormatDate();
    $Sanitation = new Sanitation();

        $page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

        $limit = $config['CT_NUMBER_OF_CATEGORIES_PER_PAGE'];

        $start = ($page - 1) * $limit;

    $where = array();
    $get_data = array();
    $get_data['s_name'] = $Sanitation->remove_html($_REQUEST['s_name'], true);
    $get_data['s_id'] = abs(intval($Sanitation->remove_html($_REQUEST['s_id'], true)));
    $get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
    $get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
    $get_data['status'] = $Sanitation->remove_html($_REQUEST['status'], true);
    $get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);

    if ($get_data['s_name'] != '' && $get_data['s_name'] !== 'undefined') {
        $where[] = " AND name LIKE '%".$Sanitation->prepare_for_database($get_data['s_name'])."%' " ;
        $searched = true;
    }

    if ($get_data['s_id'] != '' && $get_data['s_id'] !== 'undefined') {
        $where[] = " AND category_id = ".$Sanitation->prepare_for_database($get_data['s_id'])." " ;
        $searched = true;
    }

    if ($get_data['s_date_start'] != '' && $get_data['s_date_start'] != 'undefined') {
        $where[] = " AND creation_date >= '".date("Y-m-d", strtotime($get_data['s_date_start']))." 00:00:00' " ;
    }

    if ($get_data['s_date_end'] != '' && $get_data['s_date_end'] != 'undefined') {
        $where[] = " AND creation_date <= '".date("Y-m-d", strtotime($get_data['s_date_end']))." 23:59:59' " ;
    }
    
    if ($get_data['status'] != '' && $get_data['status'] !== 'undefined' ) {

        if($get_data['status']=='1')
        {
            $status=1;
        }else{
            $status=0;
        }

        $where[] = " AND status = ".$status." ";
    }

    $smarty->assign('searched',$searched);
    $smarty->assign('s_name',$get_data['s_name']);
    $smarty->assign('s_id',$get_data['s_id']);
    $smarty->assign('s_date_start',$get_data['s_date_start']);
    $smarty->assign('s_date_end',$get_data['s_date_end']);
    $smarty->assign('status',$status);

    // SORT BY FILTER NAME 0 or 1 -> DESC or ASC

    $arrow_array= array('arrow_id','arrow_name','arrow_order','arrow_status','arrow_date', '');
    $filter = $Sanitation->remove_html($_REQUEST['filter'], true);

            switch ($filter)
            {
                case 'category_id':
                $selected_arrow = $arrow_array[0];
                break;
                case 'name':
                $selected_arrow = $arrow_array[1];
                break;
                case 'display_order':
                $selected_arrow = $arrow_array[2];
                break;
                case 'status':
                $selected_arrow = $arrow_array[3];
                break;
                case 'creation_date':
                $selected_arrow = $arrow_array[4];        
                break;
                case 'undefined':
                case '':
                default:
                $selected_arrow = $arrow_array[2];
                break;
            }



    $arrow_idle = 'sprite-down-arrow-idle';
    $arrow_up = 'sprite-up-arrow';
    $arrow_down = 'sprite-down-arrow';

    #$selected_arrow = $arrow_array[0];
    //var_dump($selected_arrow);
    $sort = abs(intval($get_data['sort']));

    //var_dump($sort);
    if( $filter != '' && $filter !== 'undefined'){
        $order_by = $filter;
    }else{      
        $order_by = 'display_order';
    }

    foreach($arrow_array as $arrow)
    {   
        if($selected_arrow == $arrow && !empty($selected_arrow))
        {   
 
            if($sort == 0 && $order_by == "display_order")
            {
                $sort_by = 'desc';
                $smarty->assign($arrow, $arrow_down);
            }
            elseif($sort == 0 && $order_by !== "display_order")
            {
                $sort_by = 'asc';
                $smarty->assign($arrow, $arrow_up);    
            }
            elseif($sort == 1){
                $sort_by = 'desc'; 
                $smarty->assign($arrow, $arrow_down);
            }else{
                $sort_by = 'desc';
                $smarty->assign($arrow, $arrow_down);  
            }

        }else{
            
        $smarty->assign($arrow, $arrow_idle);

        }
    }    


    

    $smarty->assign('sort',$sort); 
    $smarty->assign('filter',$filter);

    // END SORT FILTER

    $allCategories_db = $Categories -> fetch_categories($start, $limit, $order_by, $sort_by, implode(' ', $where));
    $allCategories_db_list = $Categories -> fetch_categories(false, false,$order_by,$sort_by, implode(' ', $where));
    $total_categories = $Categories -> count_categories(implode(' ', $where));

    $allCategories = array();
    $allCategorieslist = array();
    foreach ($allCategories_db as $key => $category)
    {
        $allCategories[$key] = $category;
        $allCategories[$key]['creation_date'] =  $FormatDate -> long_format($category['creation_date']);
        $allCategories[$key]['last_updated_date'] = ($category['last_updated_date'] != '0000-00-00 00:00:00')? $FormatDate -> long_format($category['last_updated_date']) : $FormatDate -> long_format($category['creation_date']);


    }

    foreach ($allCategories_db_list as $key => $category)
    {
        $allCategorieslist[$key] = $category['category_id'];
    }

    
        if ($total_categories > 0)
        {
            $nr_of_page=ceil($total_categories/$limit);
        }
        else
        {
            $nr_of_page=1;
        }

        $min_no = $page - $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];
        $min_page = ($min_no <= 0 )? 1 : $min_no;

        $max_no = $page + $config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'];
        $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;

        $link_pagination = $admin_categories_url;
 
        $link_ajax = '';

    $smarty->assign('allCategorieslist',$allCategorieslist);
    $smarty->assign('allCategories',$allCategories);
    $smarty->assign('total_categories',($total_categories-1));
    $smarty->assign("error", '');
    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type',$type);
    $smarty->assign('current_thread', 0);
    $smarty->assign('usergroup_obj', $usergroupList);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);

    
   
    $smarty->display($tpl_folder.'/categories-list.tpl');