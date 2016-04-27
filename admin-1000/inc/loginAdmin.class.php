<?php
class loginAdmin
{
    protected $pending_widthdrawals;

    public function __construct()
    {
    }


    public function check_auth_state()
    {
        global $smarty;

        if ((!isset($_SESSION['user_id'])) || ($_SESSION['user_id'] == 0))
        {
            // Set some reasonable defaults;
            $this->set_session_defaults();
            return false;
        }

        $smarty->assign('logged_user_id', $_SESSION['user_id']);
        $smarty->assign('logged_user_name', $_SESSION['user_name']);
        $smarty->assign('logged_usergroup_id_id', $_SESSION['usergroup_id']);
        $smarty->assign('logged_user_email', $_SESSION['email']);
        return true;
    }


    protected function set_session_defaults()
    {
        $_SESSION['logged'] = false;
        $_SESSION['user_id'] = 0;
        $_SESSION['user_name'] = '';
        $_SESSION['usergroup_id'] = 0;
        $_SESSION['email'] = '';
    }


    public function login_user($email, $pass)
    {
        global $db_connection, $smarty, $tpl_folder, $tpl_folder_root;

        $smarty->assign('tpl_folder', $tpl_folder);
        $smarty->assign('tpl_folder_root', $tpl_folder_root);

        if (($email == '') && ($pass == ''))
        {
            // We return false, because at this point the user is not logged;
            return false;
        }
            // Else, we must attempt to login the user with the supplied credentials;

              $sql = "
            # File: " . __FILE__ . "
            # Line: " . __LINE__ . "
            SELECT
                user_id,
                user_name,
                usergroup_id,
                password
            FROM
                akiva_users
            WHERE
                email = '$email'
            LIMIT 1;";

        $rs = $db_connection->execute($sql);
        $pass_data = $rs->getrows();

        $user_id = $pass_data [0] ['user_id'];
        $user_name = $pass_data [0] ['user_name'];
        $usergroup_id = $pass_data [0] ['usergroup_id'];
        $pass_hash = $pass_data [0] ['password'];

        $bcrypt = new Bcrypt();
        $is_good = $bcrypt->verify($pass, $pass_hash);

        if ($is_good)
        {
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['usergroup_id'] = $usergroup_id;
            $_SESSION['email'] = $email;

            $smarty->assign('logged_user_id', $_SESSION['user_id']);
            $smarty->assign('logged_user_name', $_SESSION['user_name']);
            $smarty->assign('logged_usergroup_id_id', $_SESSION['usergroup_id']);
            $smarty->assign('logged_user_email', $_SESSION['email']);

            return true;
        }
        else
        {
            // Authentication has failed!
            $smarty->assign('user_email', $_SESSION['email']);
            $smarty->assign('error', "Incorrect email or password. Please try again.");
            return false;
        }
    }

    public function logout()
    {
        global $config, $root_url_admin;

        $base_url = $config['BASE_URL'];

        $this->set_session_defaults();
        header("Location: {$root_url_admin}/");
        exit();
    }
}
