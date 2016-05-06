<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-05 19:03:10
         compiled from "/var/www/akiva//tpl/admin-1000/asset-edit-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:855055740572b6ebe4beee1-69220302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8510450e78e1362924309ec5513e9a07e7c62d1' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/asset-edit-form.tpl',
      1 => 1460624398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '855055740572b6ebe4beee1-69220302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'asset' => 0,
    'error' => 0,
    'admin_assets_edit_url' => 0,
    'page_no' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572b6ebe4d6523_05887397',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572b6ebe4d6523_05887397')) {function content_572b6ebe4d6523_05887397($_smarty_tpl) {?><div class="error_message" id="error_messaj_<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>
<form name="problem" class="form_asset_edit" id="frm_edit_asset" asset_id="<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
" action="<?php echo $_smarty_tpl->tpl_vars['admin_assets_edit_url']->value;?>
" method="post">

    <input type="hidden" name="redirect_page" id="redirect_page" value="">

    <input type="hidden" name="menu_id" id="menu_id" value="<?php echo $_smarty_tpl->tpl_vars['asset']->value['menu_id'];?>
">

    <input type="hidden" name="page_no" value="<?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
">

    <input type="hidden" name="asset_id" value="<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
">

    <div class="form-group">
        <input type="text" class="form-control" id="public_name" name="public_name" value="<?php echo $_smarty_tpl->tpl_vars['asset']->value['public_name'];?>
">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="file_description" name="file_description" placeholder="Short description" value="<?php echo $_smarty_tpl->tpl_vars['asset']->value['file_description'];?>
">
    </div>
    <div>
        <select class="form-control" name="file_type" id="file_type" <?php if ($_smarty_tpl->tpl_vars['asset']->value['file_type']=='image') {?>disabled="disabled"<?php }?>>
            <option value="">- file type -</option>
            <option value="image" <?php if ($_smarty_tpl->tpl_vars['asset']->value['file_type']=='image') {?> selected <?php }?> >image</option>
            <option value="document" <?php if ($_smarty_tpl->tpl_vars['asset']->value['file_type']=='document') {?> selected <?php }?> >document</option>
            <option value="sound" <?php if ($_smarty_tpl->tpl_vars['asset']->value['file_type']=='sound') {?> selected <?php }?> >sound</option>
        </select>
        <?php if ($_smarty_tpl->tpl_vars['asset']->value['file_type']=='image') {?><input type="hidden" name="file_type" value="image"><?php }?>
    </div>


    <!--<input class="" type="button" value="Salveaza" asset_id="<?php echo $_smarty_tpl->tpl_vars['asset']->value['asset_id'];?>
" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
<?php }} ?>
