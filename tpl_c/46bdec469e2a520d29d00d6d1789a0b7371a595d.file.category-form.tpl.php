<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 13:52:31
         compiled from "/var/www/akiva//tpl/admin-1000/category-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1670066486572c776fd316a7-28680168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46bdec469e2a520d29d00d6d1789a0b7371a595d' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/category-form.tpl',
      1 => 1462274044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1670066486572c776fd316a7-28680168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'category' => 0,
    'action_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c776fd3fbb6_90791052',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c776fd3fbb6_90791052')) {function content_572c776fd3fbb6_90791052($_smarty_tpl) {?><div class="error_message" id="error_message">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>
<form name="frm_category" class="form_category" id="frm_category" method="post">

    <input type="hidden" name="category_id" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
">
    </div>

    <div class="form-group">
        <label for="display_order">Display order</label>
        <input type="text" class="form-control" id="display_order" name="display_order" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['display_order'];?>
">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" id="status" >
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['category']->value['status']=='1') {?> selected <?php }?> >Active</option>
            <option value="0" <?php if ($_smarty_tpl->tpl_vars['category']->value['status']=='0') {?> selected <?php }?> >Inactive</option>
        </select>
    </div>


    <input type="hidden" name="action_type" value="<?php echo $_smarty_tpl->tpl_vars['action_type']->value;?>
">
    

    <!--<input class="" type="button" value="Salveaza" category_id="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
<?php }} ?>
