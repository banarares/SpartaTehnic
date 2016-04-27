<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 12:11:11
         compiled from "/var/www/akiva//tpl/admin-1000/admin_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5344006265720822f6e2562-36812053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95f089c8cf50e3ee71a38de37cfe3ad9e19ed544' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_settings.tpl',
      1 => 1460624394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5344006265720822f6e2562-36812053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'searched' => 0,
    'admin_categories_url' => 0,
    's_name' => 0,
    'allSettings' => 0,
    'setting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720822f6fd2d5_23434809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720822f6fd2d5_23434809')) {function content_5720822f6fd2d5_23434809($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Settings</h2>

            <div class="clear" style="height:15px;"> </div>
            <div class="filter_holder <?php if ($_smarty_tpl->tpl_vars['searched']->value) {?>activ<?php }?>" <?php if ($_smarty_tpl->tpl_vars['searched']->value) {?>style="display:block;"<?php }?>>
                <form id="filter_user_frm" action="<?php echo $_smarty_tpl->tpl_vars['admin_categories_url']->value;?>
" method="get">
                    <input type="hidden" name="action" value="admin-categories">
                    <input type="text" name="s_name" class="pb_input_title" placeholder="Name"  id="s_name" value="<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
"/>

                    <input type="submit" name="Submit" value="Search" class="search" />
                    <input type="button" name="Reset" value="Reset" class="reset-btn" />

                </form>
            </div>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="setting_item('', 'add');">Add New Setting </a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="clear" ></div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Last Updated Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['setting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['setting']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allSettings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['setting']->key => $_smarty_tpl->tpl_vars['setting']->value) {
$_smarty_tpl->tpl_vars['setting']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_value'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['setting']->value['last_update_date'];?>
</td>

                            <td width="100">
                                <a href="javascript:void(0);" setting_id="<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
" title="edit" class="edit_user" onclick="setting_item(<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                <a href="javascript:void(0);" setting_id="<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
" title="delete" class="delete_setting_item"  onclick="delete_setting_item(<?php echo $_smarty_tpl->tpl_vars['setting']->value['setting_id'];?>
);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                            </td>
                        </tr>
                         <?php }
if (!$_smarty_tpl->tpl_vars['setting']->_loop) {
?>
                        <tr>
                            <td colspan="6" class="text-center">No results</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="clear" ></div>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="settingModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="settingModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_setting('frm_setting');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->



<?php }} ?>
