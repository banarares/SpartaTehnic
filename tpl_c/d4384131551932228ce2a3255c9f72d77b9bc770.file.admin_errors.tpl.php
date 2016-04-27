<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 14:15:09
         compiled from "/var/www/akiva//tpl/admin-1000/admin_errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39300861057209f3de6cd40-79806770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4384131551932228ce2a3255c9f72d77b9bc770' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_errors.tpl',
      1 => 1460624393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39300861057209f3de6cd40-79806770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57209f3de75864_35751848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57209f3de75864_35751848')) {function content_57209f3de75864_35751848($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Errors Management </h2>

            <div class="clear" style="height:15px;"> </div>

            <div ><a href="javascript:void(0);" id="clear_all_trigger">Clear all errors</a></div>

            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_errors_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        </div>

    </div>

</div>



<?php }} ?>
