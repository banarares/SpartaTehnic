<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:21
         compiled from "/var/www/akiva//tpl/admin-1000/admin-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310245460572ca2fd2d9867-78774113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18fee10a2178bf1adda9511946b8cbd57a63b1d3' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin-top.tpl',
      1 => 1462541938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310245460572ca2fd2d9867-78774113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'root_url' => 0,
    'site_logo' => 0,
    'site_name' => 0,
    'root_url_admin' => 0,
    'is_admin' => 0,
    'SESSION' => 0,
    'admin_users_logout_url' => 0,
    'tpl_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fd2e71f9_63381089',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fd2e71f9_63381089')) {function content_572ca2fd2e71f9_63381089($_smarty_tpl) {?><body>
  <header class="master-header-admin nav-down" >

      <a href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
">
      <?php if ($_smarty_tpl->tpl_vars['site_logo']->value) {?>
       <span style="width:60px;"><?php echo $_smarty_tpl->tpl_vars['site_logo']->value;?>
</span>
       <?php } else { ?>
       <h1 style="display:inline-block"><?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</h1>
      <?php }?>
      </a>

      <a href="<?php echo $_smarty_tpl->tpl_vars['root_url_admin']->value;?>
">
        Admin
      </a>


    <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
    <span class="ic-search"></span>
    <div id="meniu-top" >
        <ul class="meniu">
            <li>
                <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['user_name'];?>
, <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['email'];?>
</a><small></small>
            </li>
            <li style="float: right;"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_users_logout_url']->value;?>
" >Logout</a></li>
        </ul>
    </div>
    <?php }?>



  </header>

<div style="">
    <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
</div>
<?php }} ?>
