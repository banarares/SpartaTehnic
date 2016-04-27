<?php
/**
 * Created by PhpStorm.
 * User: gabriela
 * Date: 11/19/14
 * Time: 10:20 AM
 */

class emails_management
{
    public function __construct()
    {

    }


    public function fetch_emails_management($start = false, $limit = false, $conditions = '', $order_by = 'email_management_id', $sort_by = 'desc')
    {
        global $db_connection;

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $where = ' WHERE 1=1 ';
        
        if ($conditions != '')
        {
            $where .= $conditions;
        }

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
            case 'email_management_id':
            case 'full_name':
            case 'email':
            case 'creation_date':
                break;
            default:
                $order_by = "email_management_id";
        }

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                	email_management_id,
                	full_name,
	                email,
	                creation_date,
                    status
                FROM
                    akiva_emails_management

                $where

                ORDER BY
                    $order_by $sort_by
                ";
        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $sql .= " LIMIT $start,$limit ";
        }
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);

        return $rs->getrows();
    }

    public function count_emails_management ($conditions = '')
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
					COUNT(*) as total_jobs
				FROM
					akiva_emails_management
			    $where
				";
        $result =  $db_connection ->execute($query);
        //var_dump($query);
        if($result)
        {
            return $result->fields['total_jobs'];
        }
        else
        {
            return false;
        }
    }

    public function fetch_email_management_by_id($email_management_id)
    {
        global $db_connection;

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $email_management_id = abs(intval($email_management_id));

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                	email_management_id,
                	full_name,
	                email,
	                creation_date,
                    status
                FROM
                    akiva_emails_management
                WHERE
                    email_management_id = $email_management_id
                LIMIT 1
                ";
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);
        $data = $rs->getrows();

        return $data[0];
    }

    public function fetch_email_management_by_email($email)
    {
        global $db_connection;

        $email = $db_connection->qstr($email);

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                	email_management_id,
                	full_name,
	                email,
	                creation_date,
                    status
                FROM
                    akiva_emails_management
                WHERE
                    email = $email
                LIMIT 1
                ";
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);
        $data = $rs->getrows();

        return $data[0];
    }


    public function add($full_name, $email)
    {
        global $db_connection;

        $full_name = $db_connection->qstr($full_name);
        $email = $db_connection->qstr($email);

        $sql = "
            # File: " . __FILE__ . "
            # Line: " . __LINE__ . "
            INSERT INTO akiva_emails_management
                SET
                    full_name = {$full_name},
                    email = {$email},
                    creation_date = NOW()
            ";
        // echo "sql = '$sql' <br />\n";
        $db_connection->execute($sql);
    }

    public function update_status($email_management_id, $status)
    {
        global $db_connection;

        $email_management_id = intval($email_management_id);
        $status = intval($status);

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                UPDATE
                    akiva_emails_management
                SET
                    status = $status
                WHERE
                    email_management_id = {$email_management_id}
            ";

        // echo "sql = '$sql' <br />\n";
        $db_connection->execute($sql);
    }

    public function edit($email_management_id, $full_name, $email)
    {
        global $db_connection, $config;

        $email_management_id = intval($email_management_id);
        $full_name = $db_connection->qstr($full_name);
        $email = $db_connection->qstr($email);

        // Step1: Check if the received $email_management_id is valid;
        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                    email_management_id
                FROM
                    akiva_emails_management
                WHERE
                    email_management_id = {$email_management_id}
                LIMIT 1
                ";
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);

        $row_count = $rs->rowcount();
        if ($row_count == 0)
        {
            // We've got an invalid email_management_id
            throw new Exception('Invalid email_management_id.');
        }

        // Step2: The email_management_id is valid! We must perform the update!
        $sql = "
            # File: " . __FILE__ . "
            # Line: " . __LINE__ . "
            UPDATE akiva_emails_management
                SET
                     full_name = {$full_name},
                    email = {$email}
            WHERE
                email_management_id = {$email_management_id}
            ";
        // echo "sql = '$sql' <br />\n";
        $db_connection->execute($sql);
    }

    public function delete($email_management_id)
    {
        global $db_connection;

        $email_management_id = intval($email_management_id);
        $sql = "
            # File: " . __FILE__ . "
            # Line: " . __LINE__ . "
            DELETE FROM
                akiva_emails_management
            WHERE
                email_management_id = {$email_management_id}
            ";
        // echo "sql = '$sql' <br />\n";
        $db_connection->execute($sql);
    }


    public function validate_email_management($form_data)
    {
        global $db_connection;

        $errorMsg=array();

        if(!filter_var($form_data['email'],FILTER_VALIDATE_EMAIL) || empty($form_data['email']))
        {
            $errorMsg['email'] = "<div>Invalid Email Address.</div>";
        }
        else
        {
            if ( $this -> fetch_email_management_by_email($form_data['email']) && $form_data['action_type'] == 'add')
            {
                $errorMsg['email'] = "<div>Email Address is already in use</div>";
            }
        }

        if(empty($form_data['full_name']))
        {
            $errorMsg['full_name'] = "<div>Name is mandatory.</div>";
        }
        else
        {
            if(strlen($form_data['full_name']) < 4 || !preg_match("/^[0-9a-zA-Z-\s]+$/",$form_data['full_name']))
            {
                $errorMsg['full_name'] = "<div>Invalid Name.</div>";
            }

        }

        return $errorMsg;

    }
}
