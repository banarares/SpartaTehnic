<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 12:11:02
         compiled from "/var/www/akiva//tpl/admin-1000/admin_assets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47321419657208226d2f655-08802123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed723c516388e726abbf69604042ed24d5d52bf3' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_assets.tpl',
      1 => 1460624392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47321419657208226d2f655-08802123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'searched' => 0,
    'admin_assets_url' => 0,
    's_public_name' => 0,
    's_file_type' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'error' => 0,
    'admin_assets_add_url' => 0,
    'current_assets' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57208226d4e727_61803319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57208226d4e727_61803319')) {function content_57208226d4e727_61803319($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Assets Management</h2>

            <div class="filter_holder <?php if ($_smarty_tpl->tpl_vars['searched']->value) {?>activ<?php }?>" <?php if ($_smarty_tpl->tpl_vars['searched']->value) {?>style="display:block;"<?php }?>>
                <form id="filter_user_frm" action="<?php echo $_smarty_tpl->tpl_vars['admin_assets_url']->value;?>
" method="get">
                    <input type="hidden" name="action" value="admin-assets">
                    <input type="text" name="s_public_name" class="pb_input_title" placeholder="Public name"  id="s_public_name" value="<?php echo $_smarty_tpl->tpl_vars['s_public_name']->value;?>
"/>
                     <select name="s_file_type" class=""  id="s_file_type" style="width: 150px!important;">
                        <option value="">- file type -</option>
                        <option value="image" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='image') {?> selected <?php }?> >image</option>
                        <option value="document" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='document') {?> selected <?php }?> >document</option>
                        <option value="sound" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='sound') {?> selected <?php }?> >sound</option>
                    </select>
                    <input type="text" name="s_date_start" class="pb_input_title datepicker" placeholder="Start Date"  id="s_date_start" value="<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
"/> -
                    <input type="text" name="s_date_end" class="pb_input_title datepicker" placeholder="End Date"  id="s_date_end" value="<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
"/>
                    <input type="submit" name="Submit" value="Search" class="search" />
                    <input type="button" name="Reset" value="Reset" class="reset-btn" />

                </form>
            </div>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  id="new_file_trigger">Upload New File</a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="error_message" id="asset_error_message">

                <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                <?php } else { ?>
                <?php }?>

            </div>

            <div class="clear" ></div>

            <form name="problem" id="form_files" class="form_users" action="<?php echo $_smarty_tpl->tpl_vars['admin_assets_add_url']->value;?>
" method="post" style="display: <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>block<?php } else { ?>none<?php }?>;">
                <div class="clear" style="height:15px;"> </div>
                <div>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="fileToUpload"/><br/>
                            <div id="progressbar"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="public_name" name="public_name" placeholder="Public name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="file_description" name="file_description" placeholder="Short description">
                        </div>
                        <div>
                            <select class="form-control" name="file_type" id="file_type">
                                <option value="">- file type - </option>
                                <option value="image">image</option>
                                <option value="document">document</option>
                                <option value="sound">sound</option>
                            </select>
                        </div>
                        <input type="button" id="upload_btn" name="Start Uploading" value="Start Uploading" />
                    </form>

                </div>
            </form>


            <?php if ($_smarty_tpl->tpl_vars['current_assets']->value==1) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_assets();
                <?php echo '</script'; ?>
>
            <?php }?>

            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/assets_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

    </div>

</div>


<?php echo '<script'; ?>
>
    $(document).ready(function()
    {
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location = "/admin-1000/?action=admin-assets";
        });

        var startDate = new Date('01/01/2015');
        var FromEndDate = new Date();
        var ToEndDate = new Date();

        $('#s_date_start').datepicker({

            weekStart: 1,
            startDate: startDate,
            endDate: FromEndDate,
            autoclose: true
        })
                .on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#s_date_end').datepicker('setStartDate', startDate);
                });

        $('#s_date_end').datepicker({

            weekStart: 1,
            startDate: startDate,
            endDate: ToEndDate,
            autoclose: true
        })
                .on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#s_date_start').datepicker('setEndDate', FromEndDate);
                });
    });
<?php echo '</script'; ?>
>



<?php }} ?>
