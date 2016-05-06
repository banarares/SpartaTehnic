<?php
include "inc/config.php";

$action = filter_var($_REQUEST['action'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
if (isset($_REQUEST['q']))
{
    $action = 'article';
}


$errors = array();
$Articles = new Articles();
$Categories = new Categories();

switch($action)
{
    case 'home':
    case 'article':
    case 'products':
    case 'about':
    case 'blog':
    case 'all-blogs':
    break;
    default:
    if ($action != '')
        {
            $error_description = "Hmmmmm... invalid action! (action = '$action'). " . "User has IP : " . $_SERVER['REMOTE_ADDR'] . ".\n";
           // $error_handler->record_error($config['THIS_SITE_ID'],   $config['ERROR_SEVERITY_SECURITY'], FILE, LINE, $error_description);
        }
    $action = 'home';
}


    //ARTICLES MENU
    $where = array();
    $where[] = ' AND akiva_categories.status = 1';
    $allCategories_db = $Categories -> fetch_categories(false,false,'display_order','asc', implode(' ', $where));

    $articles_menu = array();
    $counter = 0;
    if (!empty($allCategories_db))
    {
        foreach ($allCategories_db as $key => $category)
        {
            $where = array();
            $where[] = " AND akiva_articles.category_id = ". $category['category_id'];
            $where[] = " AND akiva_articles.is_primary = 0 " ;
            $where[] = " AND akiva_articles.status = 1 " ;
            $allArticles_db = $Articles -> fetch_articles(false,false,'display_order','asc', implode(' ', $where));
            if (!empty($allArticles_db))
            {
                $articles_menu[$key]['category_title'] = $category['name'];
                foreach ($allArticles_db as $index => $articles)
                {   
                    if($articles['short_title'] !== ''){
                      $articles_menu[$key]['articles'][$index]['title'] = $articles['short_title'];                  
                    }else{
                      $articles_menu[$key]['articles'][$index]['title'] = $articles['title'];
                    }
                    $articles_menu[$key]['articles'][$index]['slug'] = $articles['slug'];
                    $counter++;
                }
            }

        } 
    }
    $smarty->assign('articles_menu', $articles_menu);
    //END OF ARTICLES MENU

$page= $_REQUEST['pageId']>0?intval($_REQUEST['pageId']):1;

$only_from_server = false; //if we need to load the page only from server or via js
$has_escaped_fragment = false;
$canonical_url = $_SERVER['REQUEST_URI'];
$REQUEST_URI = str_replace('/','',$_SERVER['REQUEST_URI']);//if is like: https://coada-soricelului.com/?_escaped_fragment_=pagina=2
//check if _escaped_fragment is present
//var_dump($REQUEST_URI);
//var_dump(strpos($REQUEST_URI, 'escaped_fragment'));
if (strpos($REQUEST_URI, '_escaped_fragment_') !== false)
{
    //get page parameter
    $pageParameters = explode('pagina=', $REQUEST_URI);
    //var_dump($pageParameters);
    if (isset($pageParameters[1]) && abs(intval($pageParameters[1])) > 0)
    {
        $page = $pageParameters[1];
        $only_from_server = true;
        $has_escaped_fragment = true;
        $canonical_url = $config['BASE_URL'].str_replace(array('?_escaped_fragment_=', '&_escaped_fragment_='),array('#!','#!'),$_SERVER['REQUEST_URI']);
        //if is like: https://coada-soricelului.com/?_escaped_fragment_=pagina=2 OR
        // if is like: https://coada-soricelului.com/cataplasma-de-coada-soricelului-este-utila-contra-alergiilor-cutanate?_escaped_fragment_=pagina=2
    }
}
$smarty->assign('has_escaped_fragment', $has_escaped_fragment);
$smarty->assign('canonical_url', $canonical_url);




//actions
if ($action == 'article')
{

    $article_slug = filter_var(str_replace('/','',$_REQUEST ['q']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

    $articleInfo = $Articles -> fetch_article_by_slug($article_slug);
    //var_dump($articleInfo);
    $smarty->assign('articleInfo', $articleInfo);

    if (empty($articleInfo))
    {
       // header("Location: $root_url/404.php");
        header('HTTP/1.0 404 Not Found');
        $smarty->assign('page_title', '404 - Page Not Found');
        $smarty->assign('error_description', 'UPS! Pagina inexistenta!');
        $smarty->display('index_error.tpl');
        exit();
    }

    $smarty->assign('page_title', $articleInfo['title']);
    $smarty->assign('meta_description', $articleInfo['meta_description']);


    $article_id = $articleInfo['article_id'];
    $smarty->assign('article_id', $article_id);
    $smarty->assign('article_slug', $articleInfo['slug']);

    $limit = $config['CT_NUMBER_OF_COMMENTS_PER_PAGE'];

    $start = ($page - 1) * $limit;

    /*
    $where = array();
    $where[] = " AND is_moderated = 1 " ;
    $where[] = " AND article_id = ".$article_id ;
    $where[] = " AND parent_comment_id = 0 " ;
    $comments_db = $Comments -> fetch_comments($start,$limit,'creation_date','asc', implode(' ', $where));

    $total_comments =  $Comments -> count_comments(implode(' ', $where));

    $commentsList = array();

    foreach ($comments_db as $key => $comment)
    {
        $commentsList[$key] = $comment;
        //$commentsList[$key]['creation_date'] =  $FormatDate -> long_format($comment['creation_date']);
        $commentsList[$key]['last_update_date'] =  $FormatDate -> long_format($comment['last_update_date']);
        $commentsList[$key]['creation_date'] = strftime("%e %B %Y %H:%M", strtotime($comment['last_update_date']));

        $where = array();
        $where[] = " AND is_moderated = 1 " ;
        $where[] = " AND article_id = ".$article_id ;
        $where[] = " AND parent_comment_id = ".$comment['comment_id'] ;
        $comments_replies_db = $Comments -> fetch_comments($start,$limit,'creation_date','asc', implode(' ', $where));
        $comments_replies = array();
        if (!empty($comments_replies_db))
        {
            foreach ($comments_replies_db as $index => $reply)
            {
                $comments_replies[$index] = $reply;
                //$commentsList[$key]['creation_date'] =  $FormatDate -> long_format($comment['creation_date']);
                $comments_replies[$index]['last_update_date'] =  $FormatDate -> long_format($reply['last_update_date']);
                $comments_replies[$index]['creation_date'] = strftime("%e %B %Y %H:%M", strtotime($reply['last_update_date']));
            }
        }
        $commentsList[$key]['comment_replies'] = $comments_replies;
    }

    $nr_of_page=ceil($total_comments/$limit);

    $min_no = $page - $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
    $min_page = ($min_no <= 0 )? 1 : $min_no;

    $max_no = $page + $config['CT__NUMBER_OF_PAGINATIONS_NUMBER'];
    $max_page = ($max_no >= $nr_of_page )? $nr_of_page : $max_no;


    $link_pagination = $admin_comments_all_url;
    $link_ajax = '';
  
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
    $smarty->assign('allComments',$commentsList);
    */
    $smarty->assign('link_pagination', $link_pagination);
    $smarty->assign('link_ajax', $link_ajax);
    $smarty->assign('min_page',$min_page);
    $smarty->assign('max_page',$max_page);

    $smarty->assign('og_title', $articleInfo['title']);
    $smarty->assign('og_description', $config['SITE_NAME'].': '. $articleInfo['title']);
    $smarty->assign('og_type', 'article');
    $smarty->assign('og_type_url', $root_url.'/'. $articleInfo['slug']);
    if ($articleInfo['social_media_image'] == ''){
        $social_media_image = $config['SOCIAL_IMAGE_LINK'];
    }
    else
    {
        $social_media_image = $articleInfo['social_media_image'];
    }
    $smarty->assign('og_type_image_url', $social_media_image);
    $smarty->assign('site_name', $config['SITE_NAME']);
    $smarty->assign('fb_page_root_url', $root_url.'/'. $articleInfo['slug']);

    $smarty->display('blog.tpl');
    exit();
}



#if submit asset is pressed - for borrowing object uploader
# must add extra feat. price, SDK (if it has more than 1 pieces of that object)
/*
if($action == 'add_asset'){

  $Sanitation = new Sanitation();

  $file_name = $Sanitation->remove_html($_REQUEST['file_name']);
  $description = $Sanitation->remove_html($_REQUEST['description']);

  $target_dir = $config['TMP_DIR'];
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  // Set a upload param in order to proceed with upload
  $uploadOk = true;
  // Get the file type
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  list($width, $height) = getimagesize($_FILES["file"]["tmp_name"]);

  # FILE, CONDITIONS FOR UPLOAD
  // Check if image file is a actual image or fake image
  if($check !== false)
  {
      $uploadOk = true;
  } else {
      $errors[] = "File is not an image.";
      $uploadOk = false;
  }

  if ($_FILES["file"]["size"] > $config['MAX_UPLOAD_SIZE'])
  {
      $errors[] = "Sorry, your file is too large.";
      $uploadOk = false;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
  {
      $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = false;
  }

  #Check if File Name is bigger than 5 char
  if(strlen($file_name) < $config['MIN_NO_OF_CHAR'] )
  {
      $is_message_too_short = 'Your file name is too short (min 5 characters)';
      $errors[] = $is_message_too_short;
  }

  #Check if File Name is bigger than 3 characters
  if(strlen($description) < $config['MIN_NO_OF_CHAR'])
  {
      $is_description_too_short = 'Your description name is way too short (min 3 characters)';
      $errors[] = $is_description_too_short;
  }

  #Check reCAPTCHA
  if (empty($_REQUEST["g-recaptcha-response"]))
  {
      $is_false_recaptcha = "How come you are a robot? It's not fair ..";
      $errors[] = $is_false_recaptcha;
  }

  #if there ar no errors than upload
  if(!$errors)
  {
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == false)
    {
        $errors[]= "Sorry, your file was not uploaded.";
    }
    // if everything is ok, try to upload file and catch errors in the process
    else
    {

      try
      {
          $asset_obj = new Assets();

          $asset_data['file'] = $_FILES['file'];
          $asset_data['local_file_name'] = md5(time());
          $asset_data['public_name'] = $file_name;
          $asset_data['file_description'] = $description;
          $asset_data['file_type'] = 'image';
          $asset_data['image_width'] = $width;
          $asset_data['image_height'] = $height;
          $asset_data['file_extension'] = $imageFileType;

          #add to database
          $asset_obj->add_asset($asset_data);

          #show if successfully uploaded file
          $errors[] = "<p class='btn btn-success'>The file ". $asset_data['public_name']. "." . $asset_data['file_extension'] ." has been uploaded.</p>";
          $errors[] = "<p class='btn btn-success'>Wait for the file to be moderated!</p>";

      }
      catch (Exception $e)
      {
          $errors[] = $e->getMessage();
      }

    }

  }
  else
  {

        $smarty->assign('file_name', $file_name);
        $smarty->assign('description', $description);
  }

}

$assets_obj = new Assets();
$assets_array = $assets_obj->fetch_assets();
$smarty->assign('assets_array', $assets_array);
$smarty->assign('errors', $errors);
*/
$smarty->assign('action', $action);

#show images
if($action == 'home'){

$smarty->display('index.tpl');

}


if($action == 'products'){

$smarty->display('products.tpl');

}

if($action == 'about'){

$smarty->display('about.tpl');

}

if($action == 'blog')
{

    $where = array();
    $where[] = ' AND akiva_articles.status = 1';
    $allArticles = $Articles -> fetch_articles(false, false,'is_primary','desc', implode(' ', $where));
    $articleInfo = $allArticles[0];

    $smarty->assign('page_title', $articleInfo['title']);
    $smarty->assign('meta_description', $articleInfo['meta_description']);

    //print_r('<pre>');print_r($allArticles);print_r('</pre>');

    $smarty->assign('articleInfo', $articleInfo);
    $article_id = $articleInfo['article_id'];
    $smarty->assign('article_id', $article_id);

    $smarty->assign('article_slug', 'Acasa');


    $limit = $config['CT_NUMBER_OF_COMMENTS_PER_PAGE'];

    $start = ($page - 1) * $limit;

    $where = array();
    $where[] = " AND is_moderated = 1 " ;
    $where[] = " AND article_id = ".$article_id ;
   

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

    $smarty->display('blog.tpl');
    exit();

}


if ($action == 'all-blogs')
{

    $smarty->assign('page_title', 'All Blogs');
    $smarty->assign('meta_description', '');
    $page = abs(intval($_REQUEST['pagina']));
    $smarty->assign('articleInfo', $allArticles); 

    $limit = $config['CT_NUMBER_OF_ARTICLES_PER_PAGE'];
    $start = ($page - 1) * $limit;

    $where = array();    
    $where[] = ' AND akiva_articles.status = 1';
    
    $allArticles = $Articles -> fetch_articles($page, $limit,'creation_date','desc', implode(' ', $where));
    $totalArticles = $Articles -> count_articles(implode(' ', $where));

    $articles_list = array();
    foreach($allArticles as $key => $art)
    {
      $articles_list[$key] = $art;
        $content = $art['version_1'];
        $content = preg_replace("/<img[^>]+\>/i", " .. ", $content); 
        #$content = preg_replace("/<p[^>]+\>/i", " ", $content);          
      $articles_list[$key]['short_description'] = substr_html($content, 0);
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

    $smarty->display('blog.tpl');
    exit();

}


     
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