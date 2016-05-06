<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:49:09
         compiled from "/var/www/akiva//tpl/admin-1000/index-admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1176658028572ca0d52fe7b7-28902543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68c733512cab8729fea8184d312376df658c1283' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/index-admin.tpl',
      1 => 1460624414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1176658028572ca0d52fe7b7-28902543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder_admin' => 0,
    'error' => 0,
    'admin_login_url' => 0,
    'user_email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca0d530a449_63632301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca0d530a449_63632301')) {function content_572ca0d530a449_63632301($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder_admin']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder_admin']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap row admin-login">

            <div class=" col-md-12">
                <div class="col-md-4">&nbsp;</div>

                <div class="col-md-4">
                    <h2 class="tell_pb left">Login in admin section</h2>
                    <div class="clear" ></div>

                    <div class="box_client_line"></div>
                    <div class="clear" ></div>

                    <div class="error_message">

                        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                        <?php } else { ?>
                        <?php }?>

                    </div>

                    <div class="clear" ></div>
                    <form name="problem" class="form_pb" action="<?php echo $_smarty_tpl->tpl_vars['admin_login_url']->value;?>
" method="post">
                        <div class="form-group">
                            <input type="text" name="user_email" class="pb_input_title" placeholder="Email"  id="login_email" value="<?php echo $_smarty_tpl->tpl_vars['user_email']->value;?>
"/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="user_password" class="pb_input_title" placeholder="Password"  id="login_pass" value=""/>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-8"><input class="btn btn-primary" type="submit" value="Login" name="login_to_admin" id="login-btn"/></div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="clear" style="margin-bottom: 30px;"></div>

                    </form>
                </div>
                <div class="col-md-4">&nbsp;</div>
            </div>


    </div>

</div>


<?php }} ?>
