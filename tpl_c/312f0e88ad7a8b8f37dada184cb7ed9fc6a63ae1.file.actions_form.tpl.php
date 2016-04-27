<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-18 10:25:37
         compiled from "/var/www/akiva//tpl/admin-1000/actions_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21037298257148bf17a7969-19914226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312f0e88ad7a8b8f37dada184cb7ed9fc6a63ae1' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/actions_form.tpl',
      1 => 1460734836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21037298257148bf17a7969-19914226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57148bf17a8880_67430296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57148bf17a8880_67430296')) {function content_57148bf17a8880_67430296($_smarty_tpl) {?><form name="problem" id="form_files" class="form_users" action="?action=admin-actions-add" method="post" >
                <div class="clear" style="height:15px;"> </div>
                <div>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="action_name" name="action_name" placeholder="Action name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="action_default" name="action_default" placeholder="Default value">
                        </div>
                        <div>

                        </div>
                        <input type="submit" class="btn btn-primary" id="upload_btn" name="Start Uploading" value="Add Action" />
                    </form>

                </div>
</form><?php }} ?>
