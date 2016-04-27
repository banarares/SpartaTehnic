<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-20 14:50:11
         compiled from "/var/www/akiva//tpl/admin-1000/add_usergroup_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108221962957176cf3790985-08414453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8818503733b0f2375ef5d7eb77e49f6a65025075' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/add_usergroup_form.tpl',
      1 => 1461050479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108221962957176cf3790985-08414453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usergroup_obj' => 0,
    'usergroup' => 0,
    'actions' => 0,
    'indiv_action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57176cf379a212_23596294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57176cf379a212_23596294')) {function content_57176cf379a212_23596294($_smarty_tpl) {?><form name="problem" id="form_files" class="form_users" action="?action=admin-add-usergroup" method="post" > 
                <div class="clear" style="height:15px;"> </div>
                <div>
                        <div class="form-group">
                            <h4>Select user type</h4>
                            <select name="usergroup" class="form-control btn-primary">
                                <?php  $_smarty_tpl->tpl_vars["usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["usergroup"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup_obj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["usergroup"]->key => $_smarty_tpl->tpl_vars["usergroup"]->value) {
$_smarty_tpl->tpl_vars["usergroup"]->_loop = true;
?>

                                    <option  value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_name'];?>
</option>

                                <?php } ?>
                            </select>        
                        </div>
                        <div class="form-group">
                            <h4>Select action id</h4>
                            <select name="action_id" class="form-control btn-primary">
                                <?php  $_smarty_tpl->tpl_vars["indiv_action"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["indiv_action"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["indiv_action"]->key => $_smarty_tpl->tpl_vars["indiv_action"]->value) {
$_smarty_tpl->tpl_vars["indiv_action"]->_loop = true;
?>

                                    <option  value="<?php echo $_smarty_tpl->tpl_vars['indiv_action']->value['action_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['indiv_action']->value['action_id'];?>
 - <?php echo $_smarty_tpl->tpl_vars['indiv_action']->value['action_name'];?>
 </option>

                                <?php } ?>
                            </select>    
                        </div>
                        <div>
                        <div class="form-group">
                            <h4>Error description</h4>
                            <textarea name="usergroup_error_description" class="form-control btn-primary" placeholder="Describe the error for this usergroup's action"></textarea>    
                        </div>
                        </div>
                        <input type="submit" class="btn btn-primary" id="upload_btn" name="Start Uploading" value="Add Usergroup" />

                </div>
</form><?php }} ?>
