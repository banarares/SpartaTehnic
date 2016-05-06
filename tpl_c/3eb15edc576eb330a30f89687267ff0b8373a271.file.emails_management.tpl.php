<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:42:40
         compiled from "/var/www/akiva//tpl/admin-1000/emails_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:355081206572c9f50932b90-82517557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb15edc576eb330a30f89687267ff0b8373a271' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/emails_management.tpl',
      1 => 1460712991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '355081206572c9f50932b90-82517557',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_emails' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c9f50933937_85273232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c9f50933937_85273232')) {function content_572c9f50933937_85273232($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="add_emai_managementl();" >Add New Email </a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="clear" ></div>


            <?php if ($_smarty_tpl->tpl_vars['current_emails']->value==1) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_emails();
                <?php echo '</script'; ?>
>
            <?php }?>

                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/emails_management_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



            <div class="clear" style="height:65px;"> </div>
            <div style=" font-size: 14px; font-style: italic;">
                These email addresses will be notified when any of the following events are happening:<br/>
                1. a new comment was added and need to be moderated;<br/><br/>
                <span style="margin-right: 5px;" class="glyphicon glyphicon-alert text-error"></span> Emails marked in this manner are currently suspended and will not receive any notifications.
            </div>

        </div>

    </div>

</div>


<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="emailModalLabel">Add Email Management</h4>
            </div>
            <div class="modal-body" id="emailModalBody">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/email-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="modal-footer">
                <button onclick="save_email_management();" class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>



<?php }} ?>
