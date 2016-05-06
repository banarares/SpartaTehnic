<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:13
         compiled from "/var/www/akiva//tpl/admin-1000/admin_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:810866589572ca2f54e7599-98417239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14d5d1166056de23ac174ad862b259e2ffd2ba2f' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_users.tpl',
      1 => 1461678128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '810866589572ca2f54e7599-98417239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_admins' => 0,
    'current_thread' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f54ee4f8_15438147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f54ee4f8_15438147')) {function content_572ca2f54ee4f8_15438147($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">User Management</h2>

            <div class="clear" style="height:15px;"> </div>

            <div class="top_edit">

                <a href="javascript:void(0);" onclick="admin_item('','add', event);" >Add New User</a>
                
                

            </div>
            <div class="clear" style="height:5px;"> </div>

            <?php if ($_smarty_tpl->tpl_vars['current_admins']->value==1) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_admins();
                <?php echo '</script'; ?>
>
            <?php }?>
 
                
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
                
                <div class="clear">&nbsp;</div>
                    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="/img/loading.gif"></div>
                <div class="clear">&nbsp;</div>
                
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/users_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                


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
