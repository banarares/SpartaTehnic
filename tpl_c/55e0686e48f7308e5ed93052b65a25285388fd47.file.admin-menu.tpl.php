<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:21
         compiled from "/var/www/akiva//tpl/admin-1000/admin-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310346533572ca2fd2e9503-38958941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e0686e48f7308e5ed93052b65a25285388fd47' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin-menu.tpl',
      1 => 1462540416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310346533572ca2fd2e9503-38958941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'admin_actions_url' => 0,
    'admin_articles_url' => 0,
    'admin_categories_url' => 0,
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
  'unifunc' => 'content_572ca2fd301b45_58101368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fd301b45_58101368')) {function content_572ca2fd301b45_58101368($_smarty_tpl) {?><div class="clear"> </div>

	<div class="content-menu content" >
        
            <ul class="meniu-footer menu_slicknav" id="admin_top_menu">
                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-actions') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_actions_url']->value;?>
" >Actions </a></li>
                <li><a href="#" >Blog </a>
                    <ul> 
                    <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-articles') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_articles_url']->value;?>
">Blog Articles</a></li>
                    <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-categories') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_categories_url']->value;?>
">Blog Categories</a></li>
                    </ul>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-errors') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_errors_url']->value;?>
" >Errors Log </a></li>
                <li><a href="#" >Users</a>
                            
                            <ul> 
                                <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-users') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_users_url']->value;?>
">User Management</a></li>
                                
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-usergroup') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_usergroup_url']->value;?>
" >User groups</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin-usergroup-actions') {?>class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['admin_usergroup_actions_url']->value;?>
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
