<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:42:40
         compiled from "/var/www/akiva//tpl/admin-1000/email-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:557417626572c9f509c1221-27809682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30c0a90279df52d622804fd77279c0aedaaaaf40' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/email-form.tpl',
      1 => 1460624407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '557417626572c9f509c1221-27809682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'page_no' => 0,
    'emailInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c9f509ca422_19978577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c9f509ca422_19978577')) {function content_572c9f509ca422_19978577($_smarty_tpl) {?><div class="error_message" id="error_message_save_email">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>
<form name="problem" class="form_admin_edit" id="frm_email_save" action="" method="post">

    <input type="hidden" name="page_no" value="<?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
">

    <input type="hidden" name="email_management_id" id="email_management_id" value="<?php echo $_smarty_tpl->tpl_vars['emailInfo']->value['email_management_id'];?>
">

    <input type="text" name="full_name" class="pb_input_title" placeholder="Full Name"  id="full_name" value="<?php echo $_smarty_tpl->tpl_vars['emailInfo']->value['full_name'];?>
"/>

    <input type="text" name="email" class="pb_input_title" placeholder="Email"  id="email" value="<?php echo $_smarty_tpl->tpl_vars['emailInfo']->value['email'];?>
"/>

</form>
<?php }} ?>
