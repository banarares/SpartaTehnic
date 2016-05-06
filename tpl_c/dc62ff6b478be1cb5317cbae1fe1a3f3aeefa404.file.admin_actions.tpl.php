<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:47:01
         compiled from "/var/www/akiva//tpl/admin-1000/admin_actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:823290144572ca055501a51-09595063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc62ff6b478be1cb5317cbae1fe1a3f3aeefa404' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_actions.tpl',
      1 => 1460962589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '823290144572ca055501a51-09595063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'is_admin' => 0,
    'actions_array' => 0,
    'actions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca055511328_89334666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca055511328_89334666')) {function content_572ca055511328_89334666($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Actions <small class="info">view only</small></h2>


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
                                    <th>Action id</th>
                                    <th>Action name</th>
                                    <th>Default value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $_smarty_tpl->tpl_vars['actions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['actions']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['actions']->key => $_smarty_tpl->tpl_vars['actions']->value) {
$_smarty_tpl->tpl_vars['actions']->_loop = true;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['actions']->value['action_id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['actions']->value['action_name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['actions']->value['action_default_value'];?>
</td>
                                    </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars['actions']->_loop) {
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

                
                
               
            <?php }?>

        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="userModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="userModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_admin('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<?php }} ?>
