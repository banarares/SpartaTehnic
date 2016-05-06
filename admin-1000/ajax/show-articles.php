<?php
require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();
$FormatDate = new FormatDate();
$Sanitation = new Sanitation();
$Categories = new Categories();

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$limit = $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];

$start = ($page - 1) * $limit;

$user_group = 'administrator_access';

$where = array();
$get_data = array();
$get_data['s_id'] = $Sanitation->remove_html($_REQUEST['s_id'], true);
$get_data['s_category_id'] = $Sanitation->remove_html($_REQUEST['s_category_id'], true);
$get_data['s_title'] = $Sanitation->remove_html($_REQUEST['s_title'], true);
$get_data['s_short_title'] = $Sanitation->remove_html($_REQUEST['s_short_title'], true);
$get_data['s_date_start'] = $Sanitation->remove_html($_REQUEST['s_date_start'], true);
$get_data['s_date_end'] = $Sanitation->remove_html($_REQUEST['s_date_end'], true);
$get_data['s_status'] = $Sanitation->remove_html(($_REQUEST['s_status']));
$get_data['sort'] = $Sanitation->remove_html($_REQUEST['sort'], true);
$filter = $Sanitation->remove_html($_REQUEST['filter'], true);


if ($get_data['s_id'] != '' && $get_data['s_id'] != 'undefined' && $get_data['s_id'] != '0') {
    $where[] = " AND article_id = '".$Sanitation->prepare_for_database($get_data['s_id'])."' " ;
}

if ($get_data['s_category_id'] != '' && $get_data['s_category_id'] != 'undefined') {
    $where[] = " AND akiva_articles.category_id = '".$Sanitation->prepare_for_database($get_data['s_category_id'])."' " ;
}

if ($get_data['s_title'] != '' && $get_data['s_title'] != 'undefined') {
    $where[] = " AND title LIKE '%".$Sanitation->prepare_for_database($get_data['s_title'])."%' " ;
}

if ($get_data['s_short_title'] != '' && $get_data['s_short_title'] != 'undefined') {
    $where[] = " AND akiva_articles.short_title LIKE '%".$Sanitation->prepare_for_database($get_data['s_short_title'])."%' " ;
}

if ($get_data['s_date_start'] != '' && $get_data['s_date_start'] != 'undefined') {
    $where[] = " AND akiva_articles.creation_date >= '".date("Y-m-d", strtotime($get_data['s_date_start']))." 00:00:00' " ;
}

if ($get_data['s_date_end'] != '' && $get_data['s_date_end'] != 'undefined') {
    $where[] = " AND akiva_articles.creation_date <= '".date("Y-m-d", strtotime($get_data['s_date_end']))." 23:59:59' " ;
}

if ($get_data['s_status'] != '' && $get_data['s_status'] != 'undefined') {
        if(abs(intval($get_data['s_status']))=='1')
        {
            $status_bit=1;
        }else{
            $status_bit=0;
        }   
    $where[] = " AND akiva_articles.status = '$status_bit' " ;
}

$smarty->assign('s_id',$get_data['s_id']);
$smarty->assign('s_category_id',$get_data['s_category_id']);
$smarty->assign('s_title',$get_data['s_title']);
$smarty->assign('s_short_title',$get_data['s_short_title']);
$smarty->assign('s_date_start',$get_data['s_date_start']);
$smarty->assign('s_date_end',$get_data['s_date_end']);
$smarty->assign('s_status',$get_data['s_status']);


    // SORT BY FILTER NAME 0 or 1 -> DESC or ASC

    $arrow_array= array('arrow_id','arrow_title','arrow_short_title','arrow_category', 'arrow_create_date', 'arrow_update_date','');
    
            switch ($filter)
            {
                case 'article_id':
                $selected_arrow = $arrow_array[0];
                break;
                case 'title':
                $selected_arrow = $arrow_array[1];
                break;
                case 'short_title':
                $selected_arrow = $arrow_array[2];
                break;
                case 'category_name':
                $selected_arrow = $arrow_array[3];
                break; 
                case 'creation_date':
                $selected_arrow = $arrow_array[4];      
                break;
                case 'last_update_date':
                $selected_arrow = $arrow_array[5];
                $filter = 'version_1_date';     
                break;
                case 'undefined':
                case '':
                default:
                $selected_arrow = $arrow_array[6];

                break;
            }


    $arrow_idle = 'sprite-down-arrow-idle';
    $arrow_up = 'sprite-up-arrow';
    $arrow_down = 'sprite-down-arrow';

    $sort = abs(intval($get_data['sort']));

    if( $filter !== '' && $filter !== 'undefined'){
        $order_by = $filter;
    }else{    
        $order_by = 'display_order';
    }   

    

    foreach($arrow_array as $arrow)
    {   
        if(($selected_arrow == $arrow && !empty($selected_arrow)))
        {   
            if($sort == 0 && $order_by == 'display_order'){
                $sort_by = 'desc';
                $smarty->assign($arrow, $arrow_down);
                
            }elseif($sort == 0 && $order_by !== 'display_order'){
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

    //var_dump($x);

    $smarty->assign('sort',$sort); 
    $smarty->assign('filter',$filter);
    // END SORT FILTER

    $allArticles_db = $Articles -> fetch_articles($start, $limit, $order_by, $sort_by, implode(' ', $where));
    $allArticles_db_list = $Articles -> fetch_articles(false, false, $order_by, $sort_by, implode(' ', $where));
	$total_articles =  $Articles -> count_articles(implode(' ', $where));

	$articlesList = array();
	foreach ($allArticles_db as $key => $article)
	{
	    $articlesList[$key] = $article;
	    $articlesList[$key]['creation_date'] =  $FormatDate -> long_format($article['creation_date']);
	    $articlesList[$key]['last_update_date'] = ($article['last_update_date'] != '0000-00-00 00:00:00')? $FormatDate -> long_format($article['last_update_date']) : $FormatDate -> long_format($article['creation_date']);
	    $articlesList[$key]['version_1_date'] =  $FormatDate -> long_format($article['version_1_date']);

	}

    foreach ($allArticles_db_list as $key => $category)
    {
        $allArticleslist[$key] = $category['article_id'];
    }

    if ($total_articles > 0)
    {
        $nr_of_page=ceil($total_articles/$limit);
    }
    else
    {
        $nr_of_page=1;
    }    

    $min_no = $page - $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;


    $link_pagination = $admin_articles_url;
    $link_ajax = '';

//print_r('<pre>');print_r($min_page . ' -> '.$max_page);print_r('</pre>');

$smarty->assign('total_articles', $total_articles-1);
$smarty->assign('allArticleslist', $allArticleslist);

$smarty->assign('page_no',$page);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('type',$type);
$smarty->assign('current_thread', 0);
$smarty->assign('allArticles',$articlesList);
$smarty->assign('link_pagination', $link_pagination);
$smarty->assign('link_ajax', $link_ajax);
$smarty->assign('min_page',$min_page);
$smarty->assign('max_page',$max_page);


$smarty->display($tpl_folder.'/articles_list.tpl');



