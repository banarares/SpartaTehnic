<?php
require('../inc/config.php');
//require('../inc/functions.php');
    $Articles = new Articles();

    $smarty->assign('page_title', 'All Blogs');
    $smarty->assign('meta_description', '');
    
    $page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

    

    $smarty->assign('articleInfo', $allArticles); 

    $limit = $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];
    $start = ($page - 1) * $limit;

    $where = array();    
    $where[] = ' AND akiva_articles.status = 1';
    
    $allArticles = $Articles -> fetch_articles($start, $limit,'creation_date','desc', implode(' ', $where));
    $totalArticles = $Articles -> count_articles(implode(' ', $where));

    $articles_list = array();
    foreach($allArticles as $key => $art)
    {
      $articles_list[$key] = $art;
        $content = $art['version_1'];
        //$content = preg_replace("/<img[^>]+\>/i", " . ", $art['version_1']); 
        //$content = preg_replace("/<i[^>]+\>/i", " .. ", $art['version_1']); 
        //$content = preg_replace("/<i[^>]+\>/i", " ", $content);
        //$content = substr_html($content,250);
        #$content = preg_replace('/<iframe.*?\/iframe>/i','', $content); 
        $content = $purifier->purify($content);
        $content = htmlspecialchars(strip_tags($content));
        $content = htmlspecialchars_decode($content);
        $content = preg_replace("/&#?[a-z0-9]{2,8};/i","",$content);
      $articles_list[$key]['short_description'] = substr_html($content , $config['CT_ALLBLOGS_SHORT_DESCRIPTION']).'...' ;
      $articles_list[$key]['article_date'] = date('D, d M Y', strtotime($art['creation_date']));
      $articles_list[$key]['article_time'] = ' at '.date('H:i:s', strtotime($art['creation_date']));
    }
    
    $nr_of_page = ceil($totalArticles/$limit);;


    $smarty->assign('allArticles',$articles_list);
    $smarty->assign('page_no',$page);
    $smarty->assign('no_of_page',$nr_of_page);
    $smarty->assign('type',$type);

    if ($only_from_server)
    {
        $smarty->assign('current_comments', 0);
    }
    else
    {
        $smarty->assign('current_comments', 1);
    }

    $link_pagination = '?action='.$action;
    
    $min_no = $page - $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];

    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;
    
    $smarty->assign('allComments',$commentsList);
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);

    $smarty->assign('og_title', $config['SITE_NAME']);
    $smarty->assign('og_description', $config['SITE_NAME'].': '. $articleInfo['title']);
    $smarty->assign('og_type', 'website');
    $smarty->assign('og_type_url', $root_url);
    if ($articleInfo['social_media_image'] == ''){
        $social_media_image = $config['SOCIAL_IMAGE_LINK'];
    }
    else
    {
        $social_media_image = $articleInfo['social_media_image'];
    }
    $smarty->assign('og_type_image_url', $social_media_image);
    $smarty->assign('site_name', $config['SITE_NAME']);

    $smarty->assign('fb_page_root_url', $root_url);

    $smarty->display('articles_list.tpl'); 
    exit();



function substr_html($string, $length)
{
    $count = 0;
    /*
     * $state = 0 - normal text
     * $state = 1 - in HTML tag
     * $state = 2 - in HTML entity
     */
    $state = 0;    
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        if ($char == '<') {
            $state = 1;
        } else if ($char == '&') {
            $state = 2;
            $count++;
        } else if ($char == ';') {
            $state = 0;
        } else if ($char == '>') {
            $state = 0;
        } else if ($state === 0) {
            $count++;
        }

        if ($count === $length) {
            return substr($string, 0, $i + 1);
        }
    }
    return $string;
}

   function closetags ( $html )
        {
        #put all opened tags into an array
        preg_match_all ( "#<([a-z]+)( .*)?(?!/)>#iU", $html, $result );
        $openedtags = $result[1];
        #put all closed tags into an array
        preg_match_all ( "#</([a-z]+)>#iU", $html, $result );
        $closedtags = $result[1];
        $len_opened = count ( $openedtags );
        # all tags are closed
        if( count ( $closedtags ) == $len_opened )
        {
        return $html;
        }
        $openedtags = array_reverse ( $openedtags );
        # close tags
        for( $i = 0; $i < $len_opened; $i++ )
        {
            if ( !in_array ( $openedtags[$i], $closedtags ) )
            {
            $html .= "</" . $openedtags[$i] . ">";
            }
            else
            {
            unset ( $closedtags[array_search ( $openedtags[$i], $closedtags)] );
            }
        }
        return $html;
    }