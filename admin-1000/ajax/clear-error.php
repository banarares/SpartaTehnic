<?php
require('../inc/config.php');

$ErrorLog = new errorHandler();
$ErrorLog -> clear_all_errors();

$allErrors = $ErrorLog -> get_all_errors();
$smarty->assign('allErrors',$allErrors);

$smarty->display($tpl_folder.'/admin_errors_list.tpl');
