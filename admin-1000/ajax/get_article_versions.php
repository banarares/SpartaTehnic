<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();
$FormatDate = new FormatDate();

$article_id = abs(intval($_REQUEST['article_id']));


$articleInfo = $Articles -> fetch_article_by_id($article_id);
//$articleInfo['version_1_date'] =  $FormatDate -> long_format($articleInfo['version_1_date']);
for($i=1; $i<=10; $i++)
{
    if (isset($articleInfo['version_'.$i.'_date']) && $articleInfo['version_'.$i.'_date'] != '0000-00-00 00:00:00')
    {
        $articleInfo['version_'.$i.'_date'] = $FormatDate -> long_format($articleInfo['version_'.$i.'_date']);
    }
    else
    {
        $articleInfo['version_'.$i.'_date'] = '';
    }
}
$smarty->assign('article',$articleInfo);


$modal_body =  $smarty->fetch($tpl_folder.'/article-all-versions.tpl');

$json_encoded = json_encode(array('modal_body'=>$modal_body), true);

/* Return JSON */
die($json_encoded);

//exit;
