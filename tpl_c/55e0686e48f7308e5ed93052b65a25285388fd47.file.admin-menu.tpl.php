<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 14:41:57
         compiled from "/var/www/akiva//tpl/admin-1000/admin-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16053336585720a5851e7c84-25340853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e0686e48f7308e5ed93052b65a25285388fd47' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin-menu.tpl',
      1 => 1461579263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16053336585720a5851e7c84-25340853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'admin_actions_url' => 0,
    'admin_errors_url' => 0,
    'is_admin' => 0,
    'admin_users_url' => 0,
    'admin_usergroup_url' => 0,
    'admin_usergroup_actions_url' => 0,
    'admin_assets_url' => 0,
    'admin_emails_management_url' => 0,
    'admin_settings_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720a5851fcbb9_84046087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720a5851fcbb9_84046087')) {function content_5720a5851fcbb9_84046087($_smarty_tpl) {?><div class="clear"> </div>

	<div class="content " >
        
            <ul class="meniu-footer menu_slicknav" id="admin_top_menu">
                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-actions') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_actions_url']->value;?>
" >Actions </a></li>
                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-errors') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_errors_url']->value;?>
" >Errors Log </a></li>
                <li  <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-users'||$_smarty_tpl->tpl_vars['action']->value=='admin-usergroup') {?> class="active"<?php }?>><a href="#" >Users</a>
                            
                            <ul> 
                                <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-users') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_users_url']->value;?>
">User Management</a></li>
                                
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-usergroup') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_usergroup_url']->value;?>
" >User groups</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-users') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_usergroup_actions_url']->value;?>
" >User group Actions</a></li>
                                <?php }?>
                            </ul>
                            
         
                </li>      
                    
                
                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-assets') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_assets_url']->value;?>
" >Assets</a></li>

                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-emails_management') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_emails_management_url']->value;?>
" >Emails</a></li>

                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-settings') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_settings_url']->value;?>
" >Settings</a></li>


            </ul>
       
	</div>
    <div class="slicky"></div>
</div>
<div class="clear"> </div>

<?php }} ?>
