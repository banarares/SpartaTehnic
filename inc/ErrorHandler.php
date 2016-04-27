<?php

/**
 * ErrorHandler Class for PHP.
 *
 * Saves error messages in the DB;
 *
 */


class ErrorHandler
{
    protected $last_error_description;

    public function __construct()
    {
    }


    public function record_error($site_id, $error_severity, $file_name, $line_number, $error_description)
    {
        global $db_connection, $config;

        $site_id = abs(intval($site_id));

        switch($error_severity)
        {
            case $config['ERROR_SEVERITY_INFO']:
            case $config['ERROR_SEVERITY_ERROR']:
            case $config['ERROR_SEVERITY_SECURITY']:
                break;

            default:
                // Unknown severity;
                return false;
        }

        $this->last_error_description = $error_description;
        $error_description = $db_connection->qstr($error_description);
        $error_severity = $db_connection->qstr($error_severity);

        $code_location_info = "$file_name:$line_number";
        $code_location_info = $db_connection->qstr($code_location_info);

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                INSERT INTO akiva_error_log
                    (site_id, log_time, severity, error_description, code_location_info)
                VALUES
                    ($site_id, NOW(), $error_severity, $error_description, $code_location_info)
                ";
        // echo "sql = '$sql' <br />\n";

        $db_connection->execute($sql);
        $order_id = $db_connection->insert_id();

        return $order_id;
    }

    public function get_last_error_description()
    {
        return $this->last_error_description;
    }

    public function clear_all_errors ()
    {
        global $db_connection;

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
               TRUNCATE TABLE akiva_error_log ";
        // echo "sql = '$sql' <br />\n";

        $empty_all = $db_connection->execute($sql);

        return $empty_all;
    } 

    public function count_all_errors ($conditions = '')
    {
        global $db_connection;

        $where = ' WHERE 1=1 ';
        if ($conditions != '')
        {
            $where .= $conditions;
        }

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					COUNT(*) as total_errors
				FROM
					akiva_error_log
			    $where
				";
        $result =  $db_connection ->execute($query);
        //var_dump($query);
        if($result)
        {
            return $result->fields['total_errors'];
        }
        else
        {
            return false;
        }
    }

    public function get_all_errors ($start = false, $limit = false, $order_by = 'log_time', $sort_by = 'desc')
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
            case 'event_id':
            case 'site_id':
            case 'log_time':
            case 'severity':
            case 'error_description':
            case 'code_location_info':
                break;
            default:
                $order_by = "log_time";
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $query = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
					SELECT
					    *
					FROM
						akiva_error_log
				    ORDER BY
						$order_by $sort_by";
        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $query .= " LIMIT $start,$limit ";
        }


        //echo  $query;
        $result = $db_connection->execute($query);

        if($result)
        {
            $errors_list = array();
            while (!$result->EOF)
            {

                $errors_list[] = $result->fields;
                $result->MoveNext();

            }
            return $errors_list;
        }
        else
        {
            return false;
        }
    }
}
