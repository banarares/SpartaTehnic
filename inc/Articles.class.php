<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gabriela
 * Date: 11/3/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Articles
{

    public function __construct()
    {
        global $db_connection;
    }

    private function generate_slug_from_url($url)
    {
        // Take care of diacritics for the Romanian language;
        $url = str_replace('ă', 'a', $url);
        $url = str_replace('Ă', 'a', $url);
        $url = str_replace('â', 'a', $url);
        $url = str_replace('Â', 'a', $url);
        $url = str_replace('î', 'i', $url);
        $url = str_replace('Î', 'i', $url);
        $url = str_replace('ş', 's', $url);
        $url = str_replace('ș', 's', $url);
        $url = str_replace('Ş', 's', $url);
        $url = str_replace('Ș', 's', $url);
        $url = str_replace('ţ', 't', $url);
        $url = str_replace('ț', 't', $url);
        $url = str_replace('Ţ', 't', $url);
        $url = str_replace('Ț', 't', $url);

        // Prepare the string with some basic normalization;
        $url = strtolower(trim($url));
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);

        // Strip any unwanted characters
        $url = preg_replace("/[^a-z0-9_\s-]/", "-", $url);
        //$url = preg_replace("![^a-z0-9]+!i", "-", $url);

        // Clean multiple dashes or whitespaces
        $url = preg_replace("/[\s-]+/", " ", $url);

        // Convert whitespaces and underscore to dash
        $url = preg_replace("/[\s_]/", "-", $url);

        // Remove dash from edges;
        $url = trim($url, '-');

        return $url;
    }

    function generate_slug($title, $action)
    {
        global $db_connection, $config;

        switch ($action)
        {
            case 'add':
            case 'edit':
                break;
            default:
                $action = "add";
        }

        //$this_site = new Site_cmsms($config['THIS_SITE_ID']);

        $initial_slug = $this -> generate_slug_from_url($title);

        $slugCompare =  $db_connection->qstr('^'.$initial_slug.'-[0-9]+$');
        $slug =  $db_connection->qstr($initial_slug);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					akiva_articles
				WHERE
					slug RLIKE $slugCompare
				OR
					slug=$slug
				" ;

        //print_r('<pre>');print_r($query);print_r('</pre>');
        $result = $db_connection->execute($query);

        $action_counter = 0;
        if ($action == 'edit') {
            $action_counter = 1;
        }
        if($result->RecordCount() > $action_counter)
        {
            $number_of_results = $result->RecordCount();
            //remove apostroph from $slug
            $slug = substr($slug, 0, -1) . '-' . $number_of_results;
            $slug = substr($slug, 1);
        }
        else
        {
            $slug = substr($slug, 0, -1);
            $slug = substr($slug, 1);
        }
        return $slug;
    }

    public function add_article ($article_data)
    {
        global $db_connection, $config;

        if (!isset($article_data['title']) || $article_data['title'] == '')
        {
            throw new Exception("Article title is mandatory");
        }
        $title = $db_connection->qstr($article_data['title']);
        $version_1 = $db_connection->qstr($article_data['version_1']);
        $social_media_image = $db_connection->qstr($article_data['social_media_image']);

        $category_id = abs(intval($article_data['category_id']));
        $status = abs(intval($article_data['status']));
        $is_primary = abs(intval($article_data['is_primary']));
        //$display_order = abs(intval($article_data['display_order']));

        if(!isset($article_data['display_order']) || $article_data['display_order'] == 0){
            $allArticles = $this->fetch_articles();
            $display_order_array = array(); 
            foreach($allArticles as $item){            
                $display_order_array[] = $item['display_order'];
            }
            $display_order = max($display_order_array)+$config['DISPLAY_ORDER_LIMIT'];
        }else{
            $display_order = abs(intval($category_data['display_order']));
        }

        if($article_data['display_order'] == 0){
        $display_order = $display_order + 100;  
        }

        $meta_description = $db_connection->qstr($article_data['meta_description']);
        $short_title = $db_connection->qstr($article_data['short_title']);

        $slug = $this -> generate_slug($title, 'add');

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				INSERT into
					akiva_articles(category_id, title, short_title, meta_description, is_primary, status, version_1, version_1_date, slug, display_order, social_media_image, creation_date, last_update_date)
				VALUES
					($category_id, $title,$short_title, $meta_description,$is_primary, $status,  $version_1, now(), '$slug', $display_order, $social_media_image, now(), now() )
				" ;

        $result= $db_connection->execute($query);
        //var_dump($query);
        if($result)
        {
            $last_article_id = (int)$db_connection->Insert_ID();

            return $last_article_id;
        }
        else
        {
            throw new Exception("Article could not be created.");
        }
    }

    public function update_article_versions ($article_data)
    {
        global $db_connection;

        $article_id = abs(intval($article_data['article_id']));
        $version_1 = $db_connection->qstr($article_data['version_1']);

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE akiva_articles SET
				    version_10 = version_9,
				    version_9 = version_8,
				    version_8 = version_7,
				    version_7 = version_6,
				    version_6 = version_5,
				    version_5 = version_4,
				    version_4 = version_3,
				    version_3 = version_2,
				    version_2 = version_1,
				    version_1 = $version_1,

				    version_10_date = version_9_date,
				    version_9_date = version_8_date,
				    version_8_date = version_7_date,
				    version_7_date = version_6_date,
				    version_6_date = version_5_date,
				    version_5_date = version_4_date,
				    version_4_date = version_3_date,
				    version_3_date = version_2_date,
				    version_2_date = version_1_date,
				    version_1_date = now()

                 WHERE
				    article_id= $article_id " ;

        $result= $db_connection->execute($query);
        //var_dump($query);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function update_article ($article_data)
    {
        global $db_connection, $config;

        $article_id = abs(intval($article_data['article_id']));

        $category_id = false;
        $category_id_action = false;
        if (isset($article_data['category_id'])) {
            $category_id = abs(intval($article_data['category_id']));
            $category_id_action = true;
        }
        $is_primary = false;
        $is_primary_action = false;
        if (isset($article_data['is_primary'])) {
            $is_primary = abs(intval($article_data['is_primary']));
            $is_primary_action = true;
        }
        $display_order = false;
        $display_order_action = false;
        if (isset($article_data['display_order'])) {
            $display_order = abs(intval($article_data['display_order']));
            $display_order_action = true;
        }

        $status = false;
        $status_action = false;
        if (isset($article_data['status'])) {
            $status = abs(intval($article_data['status']));
            $status_action = true;
        }

        $version_1 = false;
        $version_1_action = false;
        if (isset($article_data['version_1'])) {
            $version_1 = $db_connection->qstr($article_data['version_1']);
            $version_1_action = true;
        }

        $title = false;
        $title_action = false;
        if (isset($article_data['title'])) {
            $title = $db_connection->qstr($article_data['title']);
            $title_action = true;
        }
        $short_title = false;
        $short_title_action = false;
        if (isset($article_data['short_title'])) {
            $short_title = $db_connection->qstr($article_data['short_title']);
            $short_title_action = true;
        }
        $meta_description = false;
        $meta_description_action = false;
        if (isset($article_data['meta_description'])) {
            $meta_description = $db_connection->qstr($article_data['meta_description']);
            $meta_description_action = true;
        }

        $social_media_image = false;
        $social_media_image_action = false;
        if (isset($article_data['social_media_image'])) {
            $social_media_image = $db_connection->qstr($article_data['social_media_image']);
            $social_media_image_action = true;
        }

        $last_comment_date = false;
        $last_comment_date_action = false;
        if (isset($article_data['last_comment_date'])) {
            $last_comment_date = date("Y-m-d H:i:s", strtotime($article_data['last_comment_date']));
            $last_comment_date_action = true;
        }

        if ($version_1_action)
        {
           $this -> update_article_versions($article_data);
        }

        if ($title_action)
        {
            $slug = $this -> generate_slug($title, 'edit');
        }

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE
				    akiva_articles
				SET
				    last_update_date = now() ";
        if ($title_action)
        {
            $query  .= " , title = $title ,
				           slug = '$slug' ";
        }
        if ($last_comment_date_action)
        {
            $query  .= " , last_comment_date = '$last_comment_date' ";
        }
        if ($short_title_action)
        {
            $query  .= " , short_title = $short_title ";
        }
        if ($meta_description_action)
        {
            $query  .= " , meta_description = $meta_description ";
        }
        if ($category_id_action)
        {
            $query  .= " , category_id = $category_id ";
        }
        if ($is_primary_action)
        {
            $query  .= " , is_primary = $is_primary ";
        }
        if ($status_action)
        {
            $query  .= " , status = $status ";
        }
        if ($display_order_action)
        {
            $query  .= " , display_order = $display_order";
        }
        if ($social_media_image_action)
        {
            $query  .= " , social_media_image = $social_media_image";
        }

        $query  .= " WHERE
				    article_id= $article_id " ;

         $result= $db_connection->execute($query);
        //var_dump($query);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_status($article_id, $status)
    {
        global $db_connection;

        $article_id = abs(intval($article_id));

        $status = abs(intval($status));


        $query = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                UPDATE
                    akiva_articles
                SET
                    status = $status,
                    last_update_date = now()
                WHERE
                   article_id= $article_id " ;


        // echo "sql = '$sql' <br />\n";
        $db_connection->execute($query);
    }

    public function delete_article ($article_id)
    {
        global $db_connection;

        $article_id = abs(intval($article_id));

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM akiva_articles
				WHERE
				    article_id= $article_id " ;

        $result= $db_connection->execute($query);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function fetch_article_by_id ($article_id)
    {
        global $db_connection;

        $article_id = abs(intval($article_id));

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					akiva_articles.article_id, akiva_articles.category_id, akiva_articles.title, akiva_articles.short_title, akiva_articles.meta_description, akiva_articles.is_primary, akiva_articles.status,
					akiva_articles.version_1, akiva_articles.version_1_date,
					akiva_articles.version_2, akiva_articles.version_2_date,
					akiva_articles.version_3, akiva_articles.version_3_date,
					akiva_articles.version_4, akiva_articles.version_4_date,
					akiva_articles.version_5, akiva_articles.version_5_date,
					akiva_articles.version_6, akiva_articles.version_6_date,
					akiva_articles.version_7, akiva_articles.version_7_date,
					akiva_articles.version_8, akiva_articles.version_8_date,
					akiva_articles.version_8, akiva_articles.version_9_date,
					akiva_articles.version_10, akiva_articles.version_10_date,
					akiva_articles.slug, akiva_articles.display_order, akiva_articles.social_media_image, akiva_articles.creation_date, akiva_articles.last_update_date,

					akiva_categories.name as category_name
				FROM
					akiva_articles
                LEFT JOIN
                    akiva_categories ON(akiva_categories.category_id = akiva_articles.category_id)

				WHERE
					akiva_articles.article_id = $article_id
				" ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result->fields;

        }
    }

    public function fetch_article_by_slug ($article_slug)
    {
        global $db_connection, $config;


        $article_slug = $db_connection->qstr($article_slug);

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

           $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					akiva_articles.article_id, akiva_articles.category_id, akiva_articles.title, akiva_articles.short_title, akiva_articles.meta_description, akiva_articles.is_primary, akiva_articles.status,
					akiva_articles.version_1, akiva_articles.version_1_date,
					akiva_articles.version_2, akiva_articles.version_2_date,
					akiva_articles.version_3, akiva_articles.version_3_date,
					akiva_articles.version_4, akiva_articles.version_4_date,
					akiva_articles.version_5, akiva_articles.version_5_date,
					akiva_articles.version_6, akiva_articles.version_6_date,
					akiva_articles.version_7, akiva_articles.version_7_date,
					akiva_articles.version_8, akiva_articles.version_8_date,
					akiva_articles.version_8, akiva_articles.version_9_date,
					akiva_articles.version_10, akiva_articles.version_10_date,
					akiva_articles.slug, akiva_articles.display_order, akiva_articles.social_media_image, akiva_articles.creation_date, akiva_articles.last_update_date,

					akiva_categories.name as category_name
				FROM
					akiva_articles
                LEFT JOIN
                    akiva_categories ON(akiva_categories.category_id = akiva_articles.category_id)
				WHERE
					akiva_articles.slug = $article_slug
				" ;



        $result = $db_connection->execute($query);
        //print_r('<pre>'); print_r($query); print_r('</pre>');
        if(!$result)
        {
            return false;
        }
        else
        {
            return $result->fields;

        }
    }


    public function fetch_articles ($start = false, $limit = false, $order_by = 'article_id', $sort_by = 'desc', $conditions = '')
    {

        global $db_connection;

        $sort_by = strtolower($sort_by);
        switch ($sort_by)
        {
            case 'asc':
            case 'desc':
            case 'random':
                break;
            default:
                $sort_by = "desc";
        }

        $order_by = strtolower($order_by);
        switch ($order_by)
        {
            case 'article_id':
            case 'title':
            case 'short_title':
            case 'category_name':
            case 'category_id':
            case 'creation_date':
            case 'status':
            case 'display_order':
            case 'is_primary':
            break;
            default:
            $order_by = "article_id";
        }
        $where = " WHERE 1 = 1 ";
        if ($conditions != '')
        {
            $where .= ' '. $conditions;
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $queryDB = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
				SELECT
					akiva_articles.article_id, akiva_articles.category_id, akiva_articles.title, akiva_articles.short_title, akiva_articles.meta_description, akiva_articles.is_primary, akiva_articles.status,
					akiva_articles.version_1, akiva_articles.version_1_date,
					akiva_articles.version_2, akiva_articles.version_2_date,
					akiva_articles.version_3, akiva_articles.version_3_date,
					akiva_articles.version_4, akiva_articles.version_4_date,
					akiva_articles.version_5, akiva_articles.version_5_date,
					akiva_articles.version_6, akiva_articles.version_6_date,
					akiva_articles.version_7, akiva_articles.version_7_date,
					akiva_articles.version_8, akiva_articles.version_8_date,
					akiva_articles.version_8, akiva_articles.version_9_date,
					akiva_articles.version_10, akiva_articles.version_10_date,
					akiva_articles.slug, akiva_articles.display_order, akiva_articles.social_media_image, akiva_articles.creation_date, akiva_articles.last_update_date,

					akiva_categories.name as category_name
				FROM
					akiva_articles
                LEFT JOIN
                    akiva_categories ON(akiva_categories.category_id = akiva_articles.category_id)
                $where

					ORDER BY
						$order_by $sort_by";
        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $queryDB .= " LIMIT $start,$limit ";
        }
        $result = $db_connection->execute($queryDB);

        if($result)
        {
            $result_list = array();
            while (!$result->EOF)
            {

                $result_list[] = $result->fields;
                $result->MoveNext();

            }
            return $result_list;
        }
        else
        {
            return false;
        }
    }

    public function count_articles ($conditions = '')
    {
        global $db_connection;

        $where = ' WHERE 1=1 ';
        if ($conditions != '')
        {
            $where .= ' '. $conditions;
        }

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					COUNT(*) as total_articles
				FROM
					akiva_articles

			    $where
				";
        $result =  $db_connection ->execute($query);
       // var_dump($query);update_article
        if($result)
        {
            return $result->fields['total_articles'];
        }
        else
        {
            return false;
        }
    }

    public function validate_article($article_dates)
    {
        global $db_connection, $config;

        $errorMsg=array();
        $i = 1;
        if(empty($article_dates['title']))
        {
            $errorMsg[] = "<div>$i. Title is mandatory</div>";
            $i++;
        }

        if($article_dates['title'] <>'' && !preg_match("/|^[0-9\p{L}_.,';*#$@s-]+$/ui", $article_dates['title']))
        {
            $errorMsg[] = "<div>$i. Invalid Title.</div>";
            $i++;
        }       

        if(strlen($article_dates['title'])>=150)
        {
            $errorMsg[] = "<div>$i. Title is too long.</div>";
            $i++;
        }

        if($article_dates['short_title'] <>'' && !preg_match("/^[0-9\p{L}_!@#$%^&*()-+=,.;'\s-]+$/ui", $article_dates['short_title']))
        {
            $errorMsg[] = "<div>$i. Invalid Short Title.</div>";
            $i++;
        }

        if(strlen($article_dates['title'])>=100)
        {
            $errorMsg[] = "<div>$i. Short Title is too long.</div>";
            $i++;
        }

        if(empty($article_dates['category_id']))
        {
            $errorMsg[] = "<div>$i. Category is mandatory.</div>";
            $i++;
        }

        if(empty($article_dates['version_1']))
        {
            $errorMsg[] = "<div>$i. Content is mandatory.</div>";
            $i++;
        }


        return $errorMsg;

    }

    public function check_for_duplicates_display_order()
    {
        global $db_connection, $config;
        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    display_order
                FROM
                    akiva_articles
                GROUP BY
                    display_order
                HAVING count(*) > 1
                ";

        $result =  $db_connection ->execute($query);
        //var_dump($result->fields['display_order']);
        if($result)
        {
            return $result->fields['display_order'];
        }else{
            return false;
        }

    }

}
