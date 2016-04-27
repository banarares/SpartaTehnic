<?php
require('../inc/config.php');
//require('../inc/functions.php');

$ErrorLog = new error();


$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;
//$page= $_GET['pageId']>0?intval($_GET['pageId']):1;
//$page= $_GET['pageId']>0?$_GET['pageId']:1;

//var_dump($_GET);
//var_dump($page);

$initial_search = $_REQUEST['initial'];

$limit = $config['CT__NUMBER_OF_ERRORS_PER_PAGE'];

//$start = ($page - 1) * $limit;

if ($initial_search == 1)
{
    $start = 0;
    $limit = $page * $limit;
}
else
{
    $start = ($page - 1) * $limit;
}
//print_r('<pre>');print_r($start.' -> '.$limit);print_r('</pre>');
$errors_results_db = $ErrorLog -> get_all_errors($start,$limit);
//print_r('<pre>');print_r($start.' -> '.$limit);print_r('</pre>');
$errors_results = array();
foreach ($errors_results_db as $key => $row)
{
    $errors_results[$key] = $row;
}

$total_results =  $ErrorLog->count_all_errors();
$nr_of_page=ceil($total_results/$limit);

$smarty->assign('total_results',$total_results);
$smarty->assign('page_no',$page+1);
$smarty->assign('no_of_page',$nr_of_page);
$smarty->assign('s_page',$page);
$smarty->assign('all_errors',$errors_results);


/*if ($initial_search == 1)
{
    $search_results_body = $smarty->fetch('../tpl/search-result.tpl');
}
else
{*/
$search_results_body = $smarty->fetch($tpl_folder.'/errors-result-more.tpl');
//}

//$total_comments = 20;
$json_encoded = json_encode(array('errors_results_body' => $search_results_body, 'no_of_page' => $nr_of_page), true);

/* Return JSON */
die($json_encoded);
//

