<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gabriela
 * Date: 11/3/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Categories
{

    public function __construct()
    {
        global $db_connection;
    }

    function generate_slug($name, $action)
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

        $initial_slug = $this -> generate_slug_temp($name);

        $slugCompare =  $db_connection->qstr('^'.$initial_slug.'-[0-9]+$');
        $slug =  $db_connection->qstr($initial_slug);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					akiva_categories
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

private function generate_slug_temp($url)
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

    public function add_category ($category_data)
    {
        global $db_connection, $config;

        if (!isset($category_data['name']) || $category_data['name'] == '')
        {
            throw new Exception("Category name is mandatory");
        }

        $name = $db_connection->qstr($category_data['name']);

        $slug = $this -> generate_slug($name, 'add');

        
        
        if(!isset($category_data['display_order']) || $category_data['display_order'] == 0){
            $allCategories = $this->fetch_categories();
            $display_order_array = array(); 
            foreach($allCategories as $item){            
                $display_order_array[] = $item['display_order'];
            }
            $display_order = max($display_order_array)+$config['DISPLAY_ORDER_LIMIT'];
        }else{
            $display_order = abs(intval($category_data['display_order']));
        }


        $status = abs(intval($category_data['status']));

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				INSERT into
					akiva_categories(name, slug, display_order, status, creation_date )
				VALUES
					($name, '$slug', $display_order, $status, now() )
				" ;

        $result= $db_connection->execute($query);

        if($result)
        {
            $last_category_id = (int)$db_connection->Insert_ID();

            return $last_category_id;
        }
        else
        {
            throw new Exception("Category could not be created.");
        }
    }

    public function update_category ($category_data)
    {
        global $db_connection, $config;

        $category_id = abs(intval($category_data['category_id']));

        $status = false;
        $status_action = false;
        if (isset($category_data['status'])) {
            $status = abs(intval($category_data['status']));
            $status_action = true;
        }

        $display_order = false;
        $display_order_action = false;
        if (isset($category_data['display_order'])) {
            $display_order = abs(intval($category_data['display_order']));
            $display_order_action = true;
        }

        $name = false;
        $name_action = false;
        if (isset($category_data['name'])) {
            $name = $db_connection->qstr($category_data['name']);
            $name_action = true;
        }

        if ($name_action)
        {
            $slug = $this -> generate_slug($name, 'edit');
        }

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE
				    akiva_categories
				SET
				    last_updated_date = now() ";
        if ($name_action != '')
        {
            $query  .= " , name = $name ,
				           slug = '$slug' ";
        }
        if ($display_order_action)
        {
            $query  .= " , display_order = $display_order";
        }


        if ($status_action)
        {
            $query  .= " , status = $status";
        }

        $query  .= " WHERE
				    category_id= $category_id " ;

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


    private function fetch_allarticles_category_ids()
    {
        global $db_connection;

        $category_id = abs(intval($category_id));


        $query  = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT DISTINCT category_id FROM akiva_articles" ;
        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $result= $db_connection->execute($query);
        $all_array = $result->GetRows();
        $result_array = array();
        foreach($all_array as $val)
        {
            $result_array[] = $val['category_id'];
        }

        if($result)
        {
            return $result_array;
        }
        else
        {
            return false;
        }

    }

    public function delete_category ($category_id)
    {
        global $db_connection;

        $category_id = abs(intval($category_id));
        $category_ids_articles = $this-> fetch_allarticles_category_ids();
        if(in_array($category_id, $category_ids_articles)){
             return false;
        }

        
        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM akiva_categories
				WHERE
				    category_id= $category_id " ;

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

    public function fetch_category_by_id ($category_id)
    {
        global $db_connection;

        $category_id = abs(intval($category_id));

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					category_id, name, slug, display_order, status, creation_date, last_updated_date
				FROM
					akiva_categories

				WHERE
					category_id = $category_id
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

    public function fetch_category_by_slug ($category_slug)
    {
        global $db_connection, $config;


        $category_slug = $db_connection->qstr($category_slug);

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

           $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					category_id, name, slug, display_order, status, creation_date, last_updated_date
				FROM
					akiva_categories

				WHERE
					akiva_categories.slug = $category_slug
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

    public function fetch_categories ($start = false, $limit = false, $order_by = 'category_id', $sort_by = 'desc', $conditions = '')
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
            case 'category_id':
            case 'name':
            case 'slug':
            case 'status':
            case 'creation_date':
            case 'display_order':
            case 'last_updated_date':
                break;
            default:
                $order_by = "category_id";
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
					category_id, name, slug, display_order, status, creation_date, last_updated_date
				FROM
					akiva_categories

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

    public function count_categories ($conditions = '')
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
					COUNT(*) as total_categories
				FROM
					akiva_categories

			    $where
				";
       // $query = str_replace(' AND AND', ' AND ', $query);
        $result =  $db_connection ->execute($query);
       // var_dump($query);update_category
        if($result)
        {
            return $result->fields['total_categories'];
        }
        else
        {
            return false;
        }
    }

    public function check_for_duplicates_display_order(){
        global $db_connection, $config;

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    display_order
                FROM
                    akiva_categories
                GROUP BY
                    display_order
                HAVING count(*) > 1
                ";

        $result =  $db_connection ->execute($query);
        if($result)
        {
            return $result->fields['display_order'];
        }else{
            return false;
        }

    }

    public function validate_category($category_dates)
    {
        global $db_connection, $config;

        $errorMsg=array();

        if(empty($category_dates['name']))
        {
            $errorMsg['name'] = "<div>Name is mandatory</div>";
        }elseif(strlen($category_dates['name']) < 4)
        {
            $errorMsg['name'] = "<div>Name must have a minimum of 4 characters.</div>";
        }

        /*
        $display_order_array = array();        

        $allCategories = $this->fetch_categories();

        foreach($allCategories as $indiv_cat){            
            $display_order_array[$indiv_cat['category_id']] = $indiv_cat['display_order'];
        }

        //var_dump($category_dates['display_order']);
        $key = array_search($category_dates['display_order'], $display_order_array);

        if(!empty($category_dates['di']))
        {
            if ($key > 0)
            {
                $errorMsg['display_order'] = "<div>Category display order already exists.</div>";
            }
        }
        elseif($category_dates['action_type']=='edit')
        {
            $comp_1 = $this->fetch_category_by_id($category_dates['category_id']);

            if ($key <> $category_dates['category_id']) {

                if(in_array($category_dates['display_order'], $display_order_array))
                {
                    $errorMsg['display_order'] = "<div>Category display order already exists.</div>";
                }
                
            }else{

                unset($display_order_array[$key]);
                //var_dump($display_order_array);
                if(in_array($category_dates['display_order'], $display_order_array))
                {
                    $errorMsg['display_order'] = "<div>Category display order already exists.</div>";
                }


            }
        }
        */
        return $errorMsg;

    }

}
