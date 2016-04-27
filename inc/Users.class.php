<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gabriela
 * Date: 11/3/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Users
{

    public function __construct()
    {
        global $db_connection;
    }

    public function add_user ($user_data)
    {
        global $db_connection;

        if (!isset($user_data['user_name']) || $user_data['user_name'] == '')
        {
           throw new Exception("Name Is Missing.");
        }

        if (!isset($user_data['email']) || $user_data['email'] == '')
        {
           throw new Exception("Email Address Is Missing.");
        }
        if (!filter_var($user_data['email'], FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Invalid Email Address.");
        }

        $user_name = $db_connection->qstr($user_data['user_name']);
        $email = $db_connection->qstr($user_data['email']);

        $user_type = ($user_data['user_type'] == '')? "1" : $db_connection->qstr($user_data['user_type']); //1 = Administrator

        $bcrypt = new Bcrypt();
        $password = ($user_data['password'] == '')? "123456" : $bcrypt->hash($user_data['password']);

        $ip_address = ($user_data['ip_address'] == '')? "'".$_SERVER['REMOTE_ADDR']."'" : $db_connection->qstr($user_data['ip_address']);

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				INSERT into
					cms_users(user_name, user_type, email, password, created_date, ip_address)
				VALUES
					($user_name,$user_type,$email, '$password', now(), $ip_address)
				" ;

        $result= $db_connection->execute($query);

        if($result)
        {
            $last_user_id = (int)$db_connection->Insert_ID();

            return $last_user_id;
        }
        else
        {
            throw new Exception("User could not be created.");
        }
    }

    public function update_user ($user_data)
    {
        global $db_connection;

        if (!isset($user_data['user_id']))
        {
            throw new Exception("User id is missing.");
        }

        $user_id = abs(intval($user_data['user_id']));

        $user_type = false;
        $user_type_action = false;
        if (isset($user_data['user_type'])) {
            $user_type = abs(intval($user_data['user_type']));
            $user_type_action = true;
        }

        $user_name = false;
        $user_name_action = false;
        if (isset($user_data['user_name'])) {
            $user_name = $db_connection->qstr($user_data['user_name']);
            $user_name_action = true;
        }

        $email = false;
        $email_action = false;
        if (isset($user_data['email'])) {
            $email = $db_connection->qstr($user_data['email']);
            $email_action = true;
        }

        $status = false;
        $status_action = false;
        if (isset($user_data['status'])) {
            $status = $db_connection->qstr($user_data['status']);
            $status_action = true;
        }

        $password = false;
        $password_action = false;
        if (isset($user_data['password']) && $user_data['password'] != '') {
            $bcrypt = new Bcrypt();
            $password = $bcrypt->hash($user_data['password']);
            $password_action = true;
        }

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE cms_users SET
				    updated_date = now()
                    ";
        if ($user_name_action)
        {
            $query  .= " , user_name = $user_name";
        }
        if ($email_action)
        {
            $query  .= " , email = $email";
        }
        if ($user_type_action != '')
        {
            $query  .= " , user_type = $user_type";
        }
        if ($status_action)
        {
            $query  .= " , status = $status";
        }
        if ($password_action)
        {
            $query  .= " , password = '$password' ";
        }

        $query  .= "	WHERE
				    user_id= $user_id " ;

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

    public function delete_user ($user_id)
    {
        global $db_connection;
        //never delete user_id 1

        $user_id = abs(intval($user_id));
        if ($user_id > 1)
        {
            $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM cms_users
				WHERE
				    user_id= $user_id " ;

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
    }

    public function fetch_user_by_id ($user_id)
    {
        global $db_connection;

        $user_id = abs(intval($user_id));

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					cms_users.user_id, cms_users.user_name, cms_users.user_type, cms_users.email, cms_users.password, cms_users.created_date, cms_users.ip_address, cms_users.updated_date,
					cms_user_types.user_type_name
				FROM
					cms_users
				LEFT JOIN
				    cms_user_types
				ON(cms_user_types.user_type_id = cms_users.user_type)

				WHERE
					cms_users.user_id = $user_id
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

    public function fetch_user_by_email ($email)
    {
        global $db_connection;

        if (!isset($email) || $email == '')
        {
            throw new Exception("Email Address is missing.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Invalid Email Address.");
        }

        $email = $db_connection->qstr($email);

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					cms_users.user_id, cms_users.user_name, cms_users.user_type, cms_users.email, cms_users.password, cms_users.created_date, cms_users.ip_address, cms_users.updated_date,
					cms_user_types.user_type_name
				FROM
					cms_users
				LEFT JOIN
				    cms_user_types
				ON(cms_user_types.user_type_id = cms_users.user_type)

				WHERE
					email = $email
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

    public function fetch_user_by_ip ($ip)
    {
        global $db_connection;

        if (!isset($ip) || $ip == '')
        {
            throw new Exception("IP Address is missing.");
        }


        $ip = $db_connection->qstr($ip);

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					cms_users.user_id, cms_users.user_name, cms_users.user_type, cms_users.email, cms_users.password, cms_users.created_date, cms_users.ip_address, cms_users.updated_date,
					cms_user_types.user_type_name
				FROM
					cms_users
				LEFT JOIN
				    cms_user_types
				ON(cms_user_types.user_type_id = cms_users.user_type)

				WHERE
					ip_address = $ip
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

    public function fetch_users_types ($start = false, $limit = false, $order_by = 'user_type_name', $sort_by = 'desc')
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
            case 'user_type_id':
            case 'user_type_name':
                break;
            default:
                $order_by = "user_type_name";
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $query = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					cms_user_types

					ORDER BY
						$order_by $sort_by";
        if ($limit && abs(intval($start)))
        {
            $query .= " LIMIT $start,$limit ";
        }

        //echo  $query;
        $result = $db_connection->execute($query);

        if($result)
        {
            $users_list = array();
            while (!$result->EOF)
            {

                $users_list[] = $result->fields;
                $result->MoveNext();

            }
            return $users_list;
        }
        else
        {
            return false;
        }
    }

    public function fetch_users ($start = false, $limit = false, $order_by = 'user_name', $sort_by = 'asc', $conditions = '')
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
            case 'user_id':
            case 'user_name':
            case 'user_type':
            case 'email':
            case 'status':
            case 'updated_date':
            case 'created_date':
                break;
            default:
                $order_by = "user_name";
        }

        $where = " WHERE 1=1 ";
        if ($conditions != '')
        {
            $where .= $conditions;
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $query = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
					SELECT
                        cms_users.user_id, cms_users.user_name, cms_users.user_type, cms_users.email, cms_users.password, cms_users.created_date, cms_users.ip_address, cms_users.updated_date,
                        cms_user_types.user_type_name
                    FROM
                        cms_users
                    LEFT JOIN
                        cms_user_types
                    ON(cms_user_types.user_type_id = cms_users.user_type)

				    $where
					ORDER BY
						$order_by $sort_by";
        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $query .= " LIMIT $start,$limit ";
        }
        //var_dump($query);
        $result = $db_connection->execute($query);

        if($result)
        {
            $users_list = array();
            while (!$result->EOF)
            {

                $users_list[] = $result->fields;
                $result->MoveNext();

            }
            return $users_list;
        }
        else
        {
            return false;
        }
    }

    public function count_users ($conditions = '')
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
					COUNT(*) as total_users
				FROM
					cms_users
			    $where
				";
        $result =  $db_connection ->execute($query);
        //var_dump($query);
        if($result)
        {
            return $result->fields['total_users'];
        }
        else
        {
            return false;
        }
    }


    public function validate_user($user_dates)
    {
        global $db_connection;

        $errorMsg=array();

        if(!filter_var($user_dates['email'],FILTER_VALIDATE_EMAIL) || empty($user_dates['email']))
        {
            $errorMsg['email'] = "<div>Invalid email address.</div>";
        }
        else
        {
            if ( $this -> fetch_user_by_email($user_dates['email']) && $user_dates['action_type'] == 'add')
            {
                $errorMsg['email'] = "<div>This email address is already in use.</div>";
            }
        }

        if(empty($user_dates['user_name']))
        {
            $errorMsg['user_name'] = "<div>Name is mandatory.</div>";
        }
        else
        {
            if(strlen($user_dates['user_name']) < 4 || !preg_match("/^[0-9a-zA-Z-\s]+$/",$user_dates['user_name']))
            {
                $errorMsg['user_name'] = "<div>Invalid Name.</div>";
            }

        }

        if(empty($user_dates['password']) && $user_dates['action_type'] == 'add')
        {
            $errorMsg['password'] = "<div>Password is mandatory.</div>";
        }
        if(empty($user_dates['user_type']))
        {
            $errorMsg['user_type'] = "<div>User Type is mandatory.</div>";
        }

        return $errorMsg;

    }

    public function check_if_user_is_admin ($user_id)
    {
        global $db_connection;

        $user_id = abs(intval($user_id));


        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					cms_users
				WHERE
					user_id = $user_id
				" ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            if ($result->fields['user_type'] == '1')
            {
                return true;
            }
            else {
                return false;
            }


        }
    }

    public function check_if_user_is_user ($user_id)
    {
        global $db_connection;

        $user_id = abs(intval($user_id));


        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					cms_users
				WHERE
					user_id = $user_id
				" ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            if ($result->fields['user_type'] != '1')
            {
                return true;
            }
            else {
                return false;
            }


        }
    }



}
