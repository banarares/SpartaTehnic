<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:18
         compiled from "/var/www/akiva//tpl/admin-1000/admin_assets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312448630572ca2fa16b0e2-68585638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed723c516388e726abbf69604042ed24d5d52bf3' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_assets.tpl',
      1 => 1461831949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312448630572ca2fa16b0e2-68585638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'error' => 0,
    'admin_assets_add_url' => 0,
    'current_assets' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fa180d93_98892472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fa180d93_98892472')) {function content_572ca2fa180d93_98892472($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Assets Management</h2>

            <div><a href="javascript:void(0);"  id="new_file_trigger">Upload New File</a></div>

            <div class="error_message" id="asset_error_message">

                <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                <?php } else { ?>
                <?php }?>

            </div>

            <div class="clear"></div>

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

            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_filter_assets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
