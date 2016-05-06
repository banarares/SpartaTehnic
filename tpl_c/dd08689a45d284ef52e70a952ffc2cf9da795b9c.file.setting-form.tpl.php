<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-30 01:18:17
         compiled from "/var/www/akiva//tpl/admin-1000/setting-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9606447325723dda9c57c80-16122309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd08689a45d284ef52e70a952ffc2cf9da795b9c' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/setting-form.tpl',
      1 => 1460976076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9606447325723dda9c57c80-16122309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'setting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5723dda9c62757_92089071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723dda9c62757_92089071')) {function content_5723dda9c62757_92089071($_smarty_tpl) {?><div class="error_message" id="error_message">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>
<form name="frm_setting" class="form_setting" id="frm_setting" method="post">

    <input type="hidden" name="setting_id" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
">

    <div class="form-group">
        <label for="setting_name">Name</label>
        <input type="text" class="form-control" id="setting_name" name="setting_name" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_name'];?>
">
    </div>

    <div class="form-group">
        <label for="setting_value">Value</label>
        <textarea style="width: 100%; height: 100px;" name="setting_value" id="setting_value"><?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_value'];?>
</textarea>
    </div>


    <!--<input class="" type="button" value="Salveaza" setting_id="<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
<?php }} ?>
