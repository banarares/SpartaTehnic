<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 12:42:38
         compiled from "/var/www/akiva//tpl/admin-1000/admin_usergroup_actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2211669885720898e68d1e1-20051934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a940365527cd9929b58de7461c222b5780e0152b' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_usergroup_actions.tpl',
      1 => 1461161818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2211669885720898e68d1e1-20051934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_admins' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720898e699022_20232006',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720898e699022_20232006')) {function content_5720898e699022_20232006($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="wraper">
    <div class="content-wrap page">


        <div class="content">
            <h2 class="tell_pb left">Usergroup Actions</h2>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);" onclick="usergroup_action_item('','add', event);"  >Add New Usergroup Action</a></div>

            <div class="clear" style="height:15px;"> </div>

            <?php if ($_smarty_tpl->tpl_vars['current_admins']->value==1) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_admins();
                <?php echo '</script'; ?>
>
            <?php }?>

                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/usergroup_actions_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        </div>


                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_admins();
                <?php echo '</script'; ?>
>

            


    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="usergroupactionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="usergroupactionsModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="usergroupactionsModalBody"> 

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_admin('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<?php }} ?>
