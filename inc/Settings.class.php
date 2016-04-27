<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gabriela
 * Date: 11/3/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Settings
{

    public function __construct()
    {
        global $db_connection;
    }

    public function add_setting ($setting_data)
    {
        global $db_connection, $config;

        if (!isset($setting_data['setting_name']) || $setting_data['setting_name'] == '')
        {
            throw new Exception("Setting name is mandatory");
        }
        $setting_name = $db_connection->qstr($setting_data['setting_name']);

        $setting_value = $db_connection->qstr($setting_data['setting_value']);
 
        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				INSERT into
					akiva_settings(setting_name, setting_value, creation_date, last_update_date )
				VALUES
					($setting_name, $setting_value, now(), now() )
				" ;

        $result= $db_connection->execute($query);
        //var_dump($query);
        if($result)
        {
            $last_setting_id = (int)$db_connection->Insert_ID();

            return $last_setting_id;
        }
        else
        {
            throw new Exception("Setting could not be created.");
        }
    }

    public function update_setting ($setting_data)
    {
        global $db_connection, $config;

        $setting_id = abs(intval($setting_data['setting_id']));

        $setting_name = false;
        $setting_name_action = false;
        if (isset($setting_data['setting_name'])) {
            $setting_name = $db_connection->qstr($setting_data['setting_name']);
            $setting_name_action = true;
        }

        $setting_value = false;
        $setting_value_action = false;
        if (isset($setting_data['setting_value'])) {
            $setting_value = $db_connection->qstr($setting_data['setting_value']);
            $setting_value_action = true;
        }


        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE
				    akiva_settings
				SET
				    last_update_date = now() ";
        if ($setting_name_action != '')
        {
            $query  .= " , setting_name = $setting_name ";
        }

        if ($setting_value_action)
        {
            $query  .= " , setting_value = $setting_value";
        }

        $query  .= " WHERE
				    setting_id= $setting_id " ;

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

    public function delete_setting ($setting_id)
    {
        global $db_connection;

        $setting_id = abs(intval($setting_id));

       $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM akiva_settings
				WHERE
				    setting_id= $setting_id " ;

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

    public function fetch_setting_by_id ($setting_id)
    {
        global $db_connection;

        $setting_id = abs(intval($setting_id));

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					setting_id, setting_name, setting_value, creation_date, last_update_date
				FROM
					akiva_settings

				WHERE
					setting_id = $setting_id
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

    public function fetch_settings ($start = false, $limit = false, $order_by = 'setting_name', $sort_by = 'desc', $conditions = '')
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
            case 'setting_name':
            case 'setting_value':
            case 'creation_date':
            case 'last_update_date':
                break;
            default:
                $order_by = "setting_name";
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
					setting_id, setting_name, setting_value, creation_date, last_update_date
				FROM
					akiva_settings

				$where

					ORDER BY
						$order_by $sort_by";
        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $queryDB .= " LIMIT $start,$limit ";
        }
        $result = $db_connection->execute($queryDB);

        //var_dump($queryDB);
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

    public function count_settings ($conditions = '')
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
					COUNT(*) as total_settings
				FROM
					akiva_settings

			    $where
				";
       // $query = str_replace(' AND AND', ' AND ', $query);
        $result =  $db_connection ->execute($query);
       // var_dump($query);update_setting
        if($result)
        {
            return $result->fields['total_settings'];
        }
        else
        {
            return false;
        }
    }

    public function validate_setting($setting_dates)
    {
        global $db_connection, $config;

        $errorMsg=array();

        if(empty($setting_dates['setting_name']))
        {
            $errorMsg['setting_name'] = "<div>Name is mandatory</div>";
        }
        if(empty($setting_dates['setting_value']))
        {
            $errorMsg['setting_value'] = "<div>Value is mandatory</div>";
        }


        return $errorMsg;

    }

}
