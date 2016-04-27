<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 14:37:37
         compiled from "/var/www/akiva//tpl/admin-1000/users-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10058919745720a481d61ff3-72341195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f8bfb0926e99dc5d896169c2c2700e85ab910f6' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/users-form.tpl',
      1 => 1461749693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10058919745720a481d61ff3-72341195',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'user' => 0,
    'username_max_length' => 0,
    'admin_new_user_url' => 0,
    'CT_USERNAME_MAX_LENGTH' => 0,
    'usergroups' => 0,
    'usergroup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720a481d7a8b1_73788358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720a481d7a8b1_73788358')) {function content_5720a481d7a8b1_73788358($_smarty_tpl) {?><div class="error_message" id="error_message">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>

<?php echo '<script'; ?>
>
$( document ).ready(function() {
    countChar_user_management_first("<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
",<?php echo $_smarty_tpl->tpl_vars['username_max_length']->value;?>
); 
});
<?php echo '</script'; ?>
>

<form name="problem" class="form_users_edit" id="frm_admin"  user_id="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" action="<?php echo $_smarty_tpl->tpl_vars['admin_new_user_url']->value;?>
" method="post">

    <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" autocomplete="off">
    
    <input type="hidden" name="username_max_length" value="<?php echo $_smarty_tpl->tpl_vars['CT_USERNAME_MAX_LENGTH']->value;?>
" autocomplete="off">
    
    <?php if (!$_smarty_tpl->tpl_vars['user']->value['user_id']) {?>
    <input type="hidden" name="action_type" value="add" autocomplete="off">
    <?php }?>

    <div class="small btn-danger pull-right" id="edit_user_top_right">Char. <span id="charNum_user_name">0/<?php echo $_smarty_tpl->tpl_vars['username_max_length']->value;?>
</span></div>
    <input type="text" name="user_name_add" class="form-control" placeholder="User Name " onkeyup="countChar_user_management(this,<?php echo $_smarty_tpl->tpl_vars['username_max_length']->value;?>
)" autocomplete="off"  id="login_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
"/>

    <input type="text" name="email_add_user" class="form-control" placeholder="User Email " autocomplete="off"  id="login_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"/>

    <input type="text" name="password_add_user" class="form-control" placeholder="Pasword" autocomplete="off"  id="login_pass" value="" />

    <select  name="usergroup_id" id="user_type" class="form-control" >
        <option selected disabled value="" style="display:none;">Select Usergroup</option>
    <?php  $_smarty_tpl->tpl_vars["usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["usergroup"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["usergroup"]->key => $_smarty_tpl->tpl_vars["usergroup"]->value) {
$_smarty_tpl->tpl_vars["usergroup"]->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id']==$_smarty_tpl->tpl_vars['user']->value['usergroup_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_name'];?>
</option>
    <?php } ?>
    </select>

    <!--<input class="" type="button" value="Salveaza" user_id="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>

<?php }} ?>
