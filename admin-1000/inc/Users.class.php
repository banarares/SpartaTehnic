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
            throw new Exception("com_invoke(com_object, function_name)alid Email Address.");
        }

        $user_name = $db_connection->qstr($user_data['user_name']);
        $email = $db_connection->qstr($user_data['email']);

        $usergroup = ($user_data['usergroup_id'] == '')? "1" : $db_connection->qstr($user_data['usergroup_id']); //1 = Administrator

        $bcrypt = new Bcrypt();
        $password = ($user_data['password'] == '')? "123456" : $bcrypt->hash($user_data['password']);

        $update_by_user_id = $_SESSION['user_id'];

        $ip_address = ($user_data['ip_address'] == '')? "'".$_SERVER['REMOTE_ADDR']."'" : $db_connection->qstr($user_data['ip_address']);

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				INSERT into
					akiva_users(user_name, usergroup_id, email, password, created_date, ip_address, update_by_user_id)
				VALUES
					($user_name, $usergroup, $email, '$password', now(), $ip_address, $update_by_user_id)
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

        $usergroup = false;
        $usergroup_action = false;
        if (isset($user_data['usergroup_id'])) {
            $usergroup = abs(intval($user_data['usergroup_id']));
            $usergroup_action = true;
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
				UPDATE akiva_users SET
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
        if ($usergroup_action != '')
        {
            $query  .= " , usergroup_id = $usergroup";
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

        $user_id = abs(intval($user_id));
        if ($user_id > 1)
        {
            $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM akiva_users
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
					akiva_users.user_id, akiva_users.user_name, akiva_users.usergroup_id, akiva_users.email, akiva_users.password, akiva_users.created_date, akiva_users.ip_address, akiva_users.updated_date,  akiva_users.update_by_user_id,
					akiva_usergroups.usergroup_name
				FROM
					akiva_users
				LEFT JOIN
				    akiva_usergroups
				ON(akiva_usergroups.usergroup_id = akiva_users.usergroup_id)

				WHERE
					akiva_users.user_id = $user_id
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
					akiva_users.user_id, akiva_users.user_name, akiva_users.usergroup_id, akiva_users.email, akiva_users.password, akiva_users.created_date, akiva_users.ip_address, akiva_users.updated_date,
					akiva_usergroups.usergroup_name
				FROM
					akiva_users
				LEFT JOIN
				    akiva_usergroups
				ON(akiva_usergroups.usergroup_id = akiva_users.usergroup_id)

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
					akiva_users.user_id, akiva_users.user_name, akiva_users.usergroup_id, akiva_users.email, akiva_users.password, akiva_users.created_date, akiva_users.ip_address, akiva_users.updated_date,
					akiva_usergroups.usergroup_name
				FROM
					akiva_users
				LEFT JOIN
				    akiva_usergroups
				ON(akiva_usergroups.usergroup_id = akiva_users.usergroup_id)

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

 public function fetch_user_by_name ($name)
    {
        global $db_connection;

        if (!isset($name) || $name == '')
        {
            throw new Exception("Name is missing.");
        }


        $name = $db_connection->qstr($name);

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    akiva_users.user_id, akiva_users.user_name, akiva_users.usergroup_id, akiva_users.email, akiva_users.password, akiva_users.created_date, akiva_users.ip_address, akiva_users.updated_date,
                    akiva_usergroups.usergroup_name
                FROM
                    akiva_users
                LEFT JOIN
                    akiva_usergroups
                ON(akiva_usergroups.usergroup_id = akiva_users.usergroup_id)

                WHERE
                    user_name = $name
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

    public function fetch_users_types ($start = false, $limit = false, $order_by = 'usergroup_name', $sort_by = 'desc')
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
            case 'usergroup_id':
            case 'usergroup_name':
                break;
            default:
                $order_by = "usergroup_name";
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
        $query = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					akiva_usergroups

					ORDER BY
						$order_by $sort_by";
        if ($limit && abs(intval($start)))
        {
            $query .= " LIMIT $start,$limit ";
        }

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

    public function fetch_users ($start = false, $limit = false, $order_by = 'user_name', $sort_by = 'desc', $where = '')
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
            case 'usergroup':
            case 'email':
            case 'usergroup_id':
            case 'ip_address':
            case 'created_date':
                break;
            default:
            $order_by = "user_name";
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        if(!empty($where)){
            $where = "where 1=1 ".$where;
        }
        #var_dump($where);
        $query = "#File:". __FILE__ ."
					#Line: ".__LINE__ ."
					SELECT
                        akiva_users.user_id, akiva_users.user_name, akiva_users.usergroup_id, akiva_users.email, akiva_users.password, akiva_users.created_date, akiva_users.ip_address, akiva_users.updated_date,
                        akiva_usergroups.usergroup_name as usergroup_name
                    FROM
                        akiva_users
                    LEFT JOIN
                        akiva_usergroups
                    ON(akiva_usergroups.usergroup_id = akiva_users.usergroup_id) 

				    $where
					ORDER BY
						$order_by $sort_by";


        if (abs(intval($limit)) && abs(intval($start)) >= 0)
        {
            $query .= " LIMIT $start,$limit ";
        }
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

        if(!empty($conditions)){
            $conditions = 'WHERE 1 = 1 '.$conditions;
        }

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					COUNT(*) as total_users
				FROM
					akiva_users

			     $conditions
				";


        $result =  $db_connection ->execute($query);
       
        if($result)
        {
            return $result->fields['total_users'];
        } 
        else
        {
            return false;
        }
    }   

    private function check_if_user_exists($field, $value)
    {
        global $db_connection;
        
      $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    COUNT(*) as total_users
                FROM
                    akiva_users
                WHERE
                    $field = '$value'                 
                " ; 
          

        $result = $db_connection->execute($query);

        if($result)
        {   
            if($result->fields['total_users']>0){
            return $result->fields['total_users'];
            }
        }
        else
        {
            return false;
        }
    }

   public function validate_user_admin($user_dates)
    {
        global $db_connection;

        $all_users = $this -> fetch_users();

        $errorMsg=array();


        $Check_user_name = abs(intval($this->check_if_user_exists('user_name', $user_dates['user_name'])));
        $Check_email = abs(intval($this->check_if_user_exists('email', $user_dates['email'])));



        $i=1;

        if(!filter_var($user_dates['email'],FILTER_VALIDATE_EMAIL) || empty($user_dates['email']))
        {
            $errorMsg['email'] = "<div>".$i++.". Invalid email address.</div>";
        }else{
            if ($Check_email)
            {           
               
               $errorMsg['email'] = "<div>".$i++.". This email address is already in use.</div>";

            }
       
        }
         
 
        if(empty($user_dates['user_name']))
        {
            $errorMsg['user_name'] = "<div>".$i++.". Name is mandatory.</div>";
        }
        else
        {   
            if(strlen($user_dates['user_name']) < 3 || !preg_match("/^[0-9a-zA-Z-\s]+$/",$user_dates['user_name']))
            {

                $errorMsg['user_name'] = "<div>".$i++.". Invalid Name.</div>";

            }
            // $user_dates['action_type'] == 'add' && 
            elseif ($Check_user_name)
            {

                $errorMsg['user_name'] = "<div>".$i++.". This user name is already in use.</div>";

            } 

        }

        

        if($user_dates['action_type'] == 'add' && empty($user_dates['password']))
        {   
            $errorMsg['password'] = "<div>".$i++.". Password is mandatory</div>";
        }
        else
        {
            if(strlen($user_dates['password']) < 5 && $user_dates['action_type']=='add')
            {
                $errorMsg['password'] = "<div>".$i++.". Password must be minimum 5 characters</div>";
            }
            else
            {
                if(!empty($user_dates['password']) && strlen($user_dates['password']) < 5)
                {
                    $errorMsg['password'] = "<div>".$i++.". Password must be minimum 5 characters</div>";
                }
            }
            
        }



        if(empty($user_dates['usergroup_id']))
        {
            $errorMsg['usergroup_id'] = "<div>".$i++.". Usergroup is mandatory.</div>";
        }


        return $errorMsg;

    }

    




    public function validate_user($user_dates)
    {
        global $db_connection;
        switch($type_of_operation)
        {
         case 'edit':
         case '':
           break;

         default:
          throw Exception ('Invalid operation type.');
        }

        $all_users = $this -> fetch_users();

        $errorMsg=array();

        $Check_user_name = abs(intval($this->check_if_user_exists('user_name', $user_dates[user_name])));
        $Check_email = abs(intval($this->check_if_user_exists('email', $user_dates[email])));

        $i=1;

                $array_compare = $this->fetch_user_by_id($user_dates['user_id']);
                $array_compare_to = $this->fetch_user_by_email($user_dates['email']);
                $array_compare_name = $this->fetch_user_by_name($user_dates['user_name']);
                $id_compare = $array_compare['user_id'];
                $id_compare_to = $array_compare_to['user_id'];
                $id_compare_name = $array_compare_name['user_id'];

        if(!filter_var($user_dates['email'],FILTER_VALIDATE_EMAIL) || empty($user_dates['email']))
        {
            $errorMsg['email'] = "<div>".$i++.". Invalid email address.</div>";
        }else{
                

            if ($Check_email && $user_dates['action_type']=='add')
            {    
                
                $errorMsg['email'] = "<div>".$i++.". This email address is already in use.</div>";

            }elseif($Check_email && ($id_compare_to !== $id_compare)){


                    $errorMsg['email'] = "<div>".$i++.". This email address is already in use.</div>";
             
            }
        }
         
        if(empty($user_dates['user_name']))
        {
            $errorMsg['user_name'] = "<div>".$i++.". Name is mandatory.</div>";
        }
        else
        {   
            if(strlen($user_dates['user_name']) < 3 || !preg_match("/^[0-9a-zA-Z-\s]+$/",$user_dates['user_name']))
            {
                $errorMsg['user_name'] = "<div>".$i++.". Invalid Name.</div>";
            }
            else
            {
                if($Check_user_name && $user_dates['action_type']=='add'){

                    $errorMsg['user_name'] = "<div>".$i++.". This user name is already in use.</div>";   

                }elseif($Check_user_name && ($id_compare !== $id_compare_name)){
                    $errorMsg['user_name'] = "<div>".$i++.". This user name is already in use.</div>";   
                }
            } 

        }

        

        if($user_dates['action_type'] == 'add' && empty($user_dates['password']))
        {   
            $errorMsg['password'] = "<div>".$i++.". Password is mandatory</div>";
        }
        else
        {
            if(strlen($user_dates['password']) < 5 && $user_dates['action_type']=='add')
            {
                $errorMsg['password'] = "<div>".$i++.". Password must be minimum 5 characters</div>";
            }
            else
            {
                if(!empty($user_dates['password']) && strlen($user_dates['password']) < 5)
                {
                    $errorMsg['password'] = "<div>".$i++.". Password must be minimum 5 characters</div>";
                }
            }
            
        }



        if(empty($user_dates['usergroup_id']))
        {
            $errorMsg['usergroup_id'] = "<div>".$i++.". Usergroup is mandatory.</div>";
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
					akiva_users
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
            if ($result->fields['usergroup'] == $config['usergroup_admin_id'])
            {
                return true;
            }
            else {
                return false;
            }


        }
    }




   public function check_if_user_is_regular_user ($user_id)
    {
        global $db_connection;

        $user_id = abs(intval($user_id));

        $usergroup_admin_id = $config['usergroup_admin_id'] ;

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_users
                WHERE
                    user_id = $user_id
                AND
                    usergroup_id <> $usergroup_admin_id
                " ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            if ($result->fields['usergroup'] == $config['usergroup_admin_id'])
            {
                return true;
            }
            else {
                return false;
            }


        }
    }


    



}
