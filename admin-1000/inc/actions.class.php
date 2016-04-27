<?php 
class Actions
{
	public function __construct()
    {
        global $db_connection;
    }

    public function fetch_actions()
     {
         global $db_connection;

        $user_id = abs(intval($user_id));

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_actions
                " ; 

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {            
            return $result;
        }
     }

    public function validate_usergroup($user_dates)
    {
        global $db_connection;

        $errorMsg=array();
        
        $i=1;

        $Check_usergroup_name = abs(intval($this->check_if_usegroup_exists('usergroup_name' , $user_dates['usergroup_name'])));
        $usergroup_compare = $this->fetch_usergroup_by_id($user_dates['usergroup_id']);
            

        if(empty($user_dates['usergroup_name']))
        {
            $errorMsg['usergroup'] = "<div>".$i++.". Usergroup name is mandatory.</div>";
        }
        else
        {   
            if(strlen($user_dates['usergroup_name']) < 4 || strlen($user_dates['usergroup_name']) > 30 )
            {
                $errorMsg['usergroup'] = "<div>".$i++.". User group name must have minimum of 4 characters.</div>";
            }

            if (($Check_usergroup_name > 0) && ($user_dates['usergroup_name'] !== $usergroup_compare->fields['usergroup_name']))
            {
                $errorMsg['usergroup'] = "<div>".$i++.". This user group name is already in use.</div>";
            }



            if (!preg_match("/^[0-9a-zA-Z-\s]+$/",$user_dates['usergroup_name']))
            {
                $errorMsg['usergroup'] = "<div>".$i++.". User group name can't contain special characters. </div>";
            }

        }   

        return $errorMsg;

    }

    private function check_if_usegroup_exists($field, $value)
    {
      global $db_connection;
      
      $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    COUNT(*) as total_users
                FROM
                    akiva_usergroups
                WHERE
                    $field = '$value'
                " ; 
        

        $result = $db_connection->execute($query);

        if($result)
        {
            return $result->fields['total_users'];
        }
        else
        {
            return false;
        }
    }

    public function fetch_usergroups_pagination($start = false, $limit = false, $order_by='usergroup_id', $sort_by='desc', $where = '')
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
            case 'usergroup_description':
            case 'creation_date':
                break;
            default:
            $order_by = "usergroup_id";
        }

        $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);

        if(!empty($where)){
            $where = " WHERE 1=1 ".$where;
        }

        if(($limit)){
            $limit_for_pag = " LIMIT $start,$limit ";
            //var_dump($limit_for_pag);
        }
        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_usergroups
                $where
                ORDER BY
                $order_by $sort_by
                $limit_for_pag      
                " ;





    $result = $db_connection->execute($query);

        if($result)
        {
            $usergroup_list = array();
            while (!$result->EOF)
            {

                $usergroup_list[] = $result->fields;
                $result->MoveNext();

            }
            return $usergroup_list;
        }
        else
        {
            return false;
        }
     }


    public function fetch_usergroups()
     {
         global $db_connection;


        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_usergroups
                " ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result;
        }
     }

    public function count_usergroups_pagination($where = '')
     {
         global $db_connection;

        if(!empty($where)){
            $where = "WHERE 1=1 ".$where;
        }

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    COUNT(*) as total_usergroups
                FROM
                    akiva_usergroups
                $where
                " ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result->fields['total_usergroups'];
        }
     }

    public function count_usergroups()
     {
         global $db_connection;


        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    COUNT(*) as total_usergroups
                FROM
                    akiva_usergroups
                " ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result->fields['total_usergroups'];
        }
     }
 
    public function fetch_usergroup_by_id($usergroup_id)
     {
        global $db_connection;

        if(abs(intval($usergroup_id)) > 0)
        {
            $condition = "WHERE usergroup_id =  $usergroup_id";
        }else
        {
            $condition = "";
        }

        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_usergroups        
                $condition
                " ;
       

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result;
        }
     }

    public function fetch_usergroup_actions()
     {
         global $db_connection;


        $query = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT
                    *
                FROM
                    akiva_usergroup_actions
                " ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result;
        }
     }

    public function fetch_usergroup_action_by_id($usergroup_action_id)
     {
         global $db_connection;

        if( !empty($usergroup_action_id) && ($usergroup_action_id>0) ):

            $query = "#File:". __FILE__ ."
                    #Line: ".__LINE__ ."
                    SELECT
                        *
                    FROM
                        akiva_usergroup_actions
                    WHERE
                    usergroup_action_id=$usergroup_action_id
                    " ;

            $result = $db_connection->getAssoc($query);

            if(!$result)
            {
                return false;
            }
            else
            {
                return $result;
            }
        else: return false;
        endif;
     }



    public function add_usergroup($data_action_array)
     {
        global $db_connection;

        if (!isset($data_action_array['usergroup_name']) || $data_action_array['usergroup_name'] == '')
        {
           throw new Exception("Usergroup Is Missing.");
        }


        $usergroup_name = $data_action_array['usergroup_name'] ;
        $usergroup_description = $data_action_array['usergroup_description'];
        $admin_id = 1;

        $creation_date = date('Y-m-d H:i:s');



        $query  = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                INSERT into
                    akiva_usergroups(usergroup_name, usergroup_description, creation_date, last_update_by)
                VALUES
                    ('$usergroup_name', '$usergroup_description', '$creation_date', $admin_id)
                " ;

        $result= $db_connection->execute($query);


        if($result)
        {
            $last_usergroup_action_id = (int)$db_connection->Insert_ID();


            return $last_usergroup_action_id;
        }
        else
        {
            throw new Exception("Usergroup could not be created.");
        }

     }



    public function udpate_usergroup_actions($form_data)
    {
        global $db_connection, $Sanitation;

        if (!isset($form_data['usergroup_action_id']))
        {
            throw new Exception("Usergroup action id is missing.");
        }

        $usergroup_data['usergroup_action_id'] = abs(intval($form_data['usergroup_action_id']));
        $usergroup_data['usergroup'] = $Sanitation->remove_html($form_data['usergroup'], true);
        $usergroup_data['action_id'] =  abs(intval($form_data['action_id']));
        $usergroup_data['error_description'] =  $Sanitation->remove_html($form_data['error_description'], true);

        $usergroup_action_id = abs(intval($usergroup_data['usergroup_action_id'])); 

        $usergroup = false;
        $usergroup_action = false;
        if (isset($usergroup_data['usergroup'])) {
            $usergroup = $usergroup_data['usergroup'];
            $usergroup_action = true;
        }

        $action_id = false;
        $action_id_action = false;
        if (isset($usergroup_data['action_id'])) {
            $action_id = $db_connection->qstr($usergroup_data['action_id']);
            $action_id_action = true;
        }

        $usergroup_error_description = false;
        $usergroup_error_description_action = false;
        if (isset($usergroup_data['error_description'])) {
            $usergroup_error_description = $db_connection->qstr($usergroup_data['error_description']);
            $usergroup_error_description_action = true;
        }


        $query  = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                UPDATE akiva_usergroup_actions SET
                        ";

        if ($usergroup_action)
        {
            $query  .= " usergroup = '$usergroup'";
        }
        if ($action_id_action)
        {
            $query  .= " , action_id = $action_id ";
        }
        if ($usergroup_error_description_action)
        {
            $query  .= " , error_description = $usergroup_error_description";
        }


        $query  .= "    WHERE
                    usergroup_action_id= $usergroup_action_id " ;

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

public function udpate_usergroup($form_data)
    {
        global $db_connection, $Sanitation;

        if (!isset($form_data['usergroup_id']))
        {
            throw new Exception("Usergroup is missing.");
        }
 
        $usergroup_data['usergroup_id'] = abs(intval($form_data['usergroup_id']));
        $usergroup_data['usergroup_name'] = $Sanitation->remove_html($form_data['usergroup_name'], true);
        $usergroup_data['usergroup_description'] =  $Sanitation->remove_html(($form_data['usergroup_description']));
        $usergroup_data['usergroup_last_update_by'] =  $Sanitation->remove_html(($form_data['usergroup_last_update_by']));

        $usergroup_id = abs(intval($usergroup_data['usergroup_id'])); 

        $usergroup = false;
        $usergroup_action = false;
        if (isset($usergroup_data['usergroup_name'])) 
        {
            $usergroup_compare = $this->fetch_usergroup_by_id($usergroup_data['usergroup_id']);
            $check_if_usegroup_exists = $this->check_if_usegroup_exists('usergroup_name', $usergroup_data['usergroup_name']);

            if($check_if_usegroup_exists==0 || ($usergroup_data['usergroup_name']==$usergroup_compare->fields['usergroup_name']) ){   
            $usergroup = $usergroup_data['usergroup_name'];
            $usergroup_action = true;
            }
        }



        $usergroup_last_update_by = false;
        $usergroup_last_update_by_action = false;
        if (isset($usergroup_data['usergroup_last_update_by'])) 
        {
            $usergroup_last_update_by = $usergroup_data['usergroup_last_update_by'];
            $usergroup_last_update_by_action = true;
        }


        $usergroup_description = false;
        $usergroup_description_action = false;
        if (isset($usergroup_data['usergroup_description'])) 
        {
            $usergroup_description = $db_connection->qstr($usergroup_data['usergroup_description']);
            $usergroup_description_action = true;
        }

        if ($usergroup_action)
        {
            $query  = "#File:". __FILE__ ."
                    #Line: ".__LINE__ ."
                    UPDATE akiva_usergroups SET
                            ";


                $query  .= " usergroup_name = '$usergroup'";

            if ($usergroup_description_action)
            {
                $query  .= ", usergroup_description = $usergroup_description ";
            }
            if ($usergroup_last_update_by)
            {
                $query  .= ", last_update_by = $usergroup_last_update_by ";
            }

            $query  .= "    WHERE
                        usergroup_id= $usergroup_id " ;


            $result= $db_connection->execute($query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }else{
            return false;
        }

    }


    private function fetch_users_with_usergroup_id($usergroup_id)
    {
        global $db_connection;

        $query  = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                SELECT count(*) as total_users
                FROM akiva_users
                WHERE
                usergroup_id= $usergroup_id " ;

        $result= $db_connection->execute($query);
        if($result){
            return $result->fields['total_users'];
        }else{
            return 0;
        }
    }


    public function delete_usergroup($usergroup_id)
     {
        global $db_connection;

        $usergroup_id = abs(intval($usergroup_id));

        $users_with_usergroup_id = $this->fetch_users_with_usergroup_id($usergroup_id);


        if ($usergroup_id > 1 && $users_with_usergroup_id==0)
        {
            $query  = "#File:". __FILE__ ."
                #Line: ".__LINE__ ."
                DELETE FROM akiva_usergroups
                WHERE
                usergroup_id= $usergroup_id " ;



            $result= $db_connection->execute($query);

            if($result)
            {
                return 'ok';
            }
            else
            {
                return false;
            }
        }elseif($users_with_usergroup_id > 0){
            return "This user group contains $users_with_usergroup_id users. Please move these $users_with_usergroup_id users before deleting this usergroup. Thank you!";
        }

     }
    
}