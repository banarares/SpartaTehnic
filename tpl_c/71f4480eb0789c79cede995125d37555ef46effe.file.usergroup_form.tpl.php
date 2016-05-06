<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 13:50:59
         compiled from "/var/www/akiva//tpl/admin-1000/usergroup_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1735192396572c771386c9b7-30994509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71f4480eb0789c79cede995125d37555ef46effe' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/usergroup_form.tpl',
      1 => 1461749737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1735192396572c771386c9b7-30994509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'action_type' => 0,
    'usergroup' => 0,
    'selected_usergroup' => 0,
    'usergroup_max_length' => 0,
    'usergroup_description_max_length' => 0,
    'admin_add_usergroup_url' => 0,
    'admin_add_usergroup_add_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c7713887316_10278454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c7713887316_10278454')) {function content_572c7713887316_10278454($_smarty_tpl) {?>
<div class="error_message" id="error_message">


    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>
        

</div>



<?php if ($_smarty_tpl->tpl_vars['action_type']->value=='edit') {?> 

<?php  $_smarty_tpl->tpl_vars["selected_usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["selected_usergroup"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["selected_usergroup"]->key => $_smarty_tpl->tpl_vars["selected_usergroup"]->value) {
$_smarty_tpl->tpl_vars["selected_usergroup"]->_loop = true;
?>
<?php echo '<script'; ?>
>
$( document ).ready(function() {
    countChar_name_first("<?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_name'];?>
",<?php echo $_smarty_tpl->tpl_vars['usergroup_max_length']->value;?>
);
    countChar_description_first("<?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_description'];?>
", <?php echo $_smarty_tpl->tpl_vars['usergroup_description_max_length']->value;?>
);
});
<?php echo '</script'; ?>
>



<form name="problem" class="form_usergroup_edit" id="frm_usergroup"  usergroup_id="<?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_id'];?>
" action="<?php echo $_smarty_tpl->tpl_vars['admin_add_usergroup_url']->value;?>
" method="post">


    <input type="hidden" name="usergroup_id" value="<?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_id'];?>
" />


    <div class="form-group">

        <h4>Usergroup name</h4>
        <div class="small  pull-right" id="usergroup_name" >Char. <span id="charNum_name">0/<?php echo $_smarty_tpl->tpl_vars['usergroup_max_length']->value;?>
</span></div>          

        <input name="usergroup_name" class="form-control " onkeyup="countChar_name(this, <?php echo $_smarty_tpl->tpl_vars['usergroup_max_length']->value;?>
)" value="<?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_name'];?>
" />
         
    </div>

    <div class="form-group">

        <h4>Usergroup description</h4>
                <div class="small btn-success pull-right" id="usergroup_description" >Char. <span id="charNum_description" >0/<?php echo $_smarty_tpl->tpl_vars['usergroup_description_max_length']->value;?>
</span></div>

        <textarea name="usergroup_description" class="form-control " id="field" onkeyup="countChar_description(this, <?php echo $_smarty_tpl->tpl_vars['usergroup_description_max_length']->value;?>
)" placeholder="Describe usergroup"><?php echo $_smarty_tpl->tpl_vars['selected_usergroup']->value['usergroup_description'];?>
</textarea>

    </div>

 	

</form>
<?php } ?>

<?php } else { ?>
<form name="problem" class="form_usergroup_edit" id="frm_usergroup" action="<?php echo $_smarty_tpl->tpl_vars['admin_add_usergroup_add_url']->value;?>
" method="post">
    <input type="hidden" name="usergroup_id" value="" />
   <div class="form-group">

        <h4>Usergroup name</h4>
        <div class="small btn-danger pull-right" id="usergroup_name" >Char. <span id="charNum_name">0/<?php echo $_smarty_tpl->tpl_vars['usergroup_max_length']->value;?>
</span></div>          

        <input name="usergroup_name" class="form-control "  onkeyup="countChar_name(this, <?php echo $_smarty_tpl->tpl_vars['usergroup_max_length']->value;?>
)" />

    </div>

    <div class="form-group">

        <h4>Usergroup description</h4>
        <div class="small btn-success pull-right" id="usergroup_description" >Char. <span id="charNum_description" >0/<?php echo $_smarty_tpl->tpl_vars['usergroup_description_max_length']->value;?>
</span></div>

        <textarea name="usergroup_description" class="form-control " id="field" onkeyup="countChar_description(this, <?php echo $_smarty_tpl->tpl_vars['usergroup_description_max_length']->value;?>
)" placeholder="Describe usergroup"></textarea> 

    
    </div>
</form>
<?php }?>

<?php }} ?>
