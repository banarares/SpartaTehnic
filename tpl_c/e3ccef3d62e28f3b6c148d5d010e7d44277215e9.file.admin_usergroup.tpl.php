<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:14
         compiled from "/var/www/akiva//tpl/admin-1000/admin_usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1354125922572ca2f6e097c1-15467695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3ccef3d62e28f3b6c148d5d010e7d44277215e9' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_usergroup.tpl',
      1 => 1461675709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1354125922572ca2f6e097c1-15467695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f6e17055_14635090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f6e17055_14635090')) {function content_572ca2f6e17055_14635090($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php if ($_smarty_tpl->tpl_vars['current_admin']->value==1) {?>

            <?php }?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_pagination_user_groups();
                <?php echo '</script'; ?>
>
<div class="wraper">
    <div class="content-wrap page">



        <div class="content">
            <h2 class="tell_pb left">Management of user groups</h2>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);" onclick="usergroup_item('','add', event);"  >Add New User group</a></div>

            <div class="clear" style="height:15px;"></div>



                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_filter_usergroup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/usergroup_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
                
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="usergroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="usergroupModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="usergroupModalBody"> 

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_usergroup('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<?php }} ?>
