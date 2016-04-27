<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 12:42:38
         compiled from "/var/www/akiva//tpl/admin-1000/usergroup_actions_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13459155505720898e6cc359-51912472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e340dc3d459fca3ab5486f1c246faed474127d8' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/usergroup_actions_list.tpl',
      1 => 1461161774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13459155505720898e6cc359-51912472',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_admin' => 0,
    'actions' => 0,
    'individual_action' => 0,
    'usergroup_obj' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720898e6df042_05774093',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720898e6df042_05774093')) {function content_5720898e6df042_05774093($_smarty_tpl) {?>
            <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_admins();
                <?php echo '</script'; ?>
>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                     <tr>
                                        <th><small>Usergroup action id</small></th>
                                        <th><small>Usergroup</small></th>
                                        <th><small>Action ID</small></th>
                                        <th><small>Action Description</small></th>
                                        <th><small>Error Description</small></th>
                                        <th><small>Actions</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['individual_action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['individual_action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['individual_action']->key => $_smarty_tpl->tpl_vars['individual_action']->value) {
$_smarty_tpl->tpl_vars['individual_action']->_loop = true;
?>
                                        <tr>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_action_id'];?>
</td>
                                            <td class="text-center">
                                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup_obj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['usergroup_id']==$_smarty_tpl->tpl_vars['individual_action']->value['usergroup_id']) {
echo $_smarty_tpl->tpl_vars['item']->value['usergroup_name'];
}?>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['individual_action']->value['action_id'];?>
</td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['individual_action']->value['action_value'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['individual_action']->value['error_description'];?>
</td>
                                            <td >

                                                <a href="javascript:void(0);" usergroup_id="<?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_action_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_action_id'];?>
" title="edit" class="edit_user" onclick="usergroup_item(<?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_id'];?>
, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                                <a href="javascript:void(0);" usergroup_id="<?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_action_id'];?>
" title="delete" class="delete_usergroup_item"  onclick="delete_usergroup_item(<?php echo $_smarty_tpl->tpl_vars['individual_action']->value['usergroup_action_id'];?>
);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                        </tr>
                                        <?php }
if (!$_smarty_tpl->tpl_vars['individual_action']->_loop) {
?>
                                        <tr>
                                            <td colspan="5" class="text-center">No results</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
             
                </div>

 
                

                
                
                </ul>
            <?php }?>
<?php }} ?>
