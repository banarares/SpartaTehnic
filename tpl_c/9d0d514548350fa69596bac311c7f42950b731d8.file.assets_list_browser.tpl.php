<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 11:39:37
         compiled from "/var/www/akiva//tpl/admin-1000/assets_list_browser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1160055431572c5849ca3c88-07894797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d0d514548350fa69596bac311c7f42950b731d8' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/assets_list_browser.tpl',
      1 => 1462375952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1160055431572c5849ca3c88-07894797',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder_admin' => 0,
    'current_assets' => 0,
    'pageTitle' => 0,
    'CKEditorFuncNum' => 0,
    'current_thread' => 0,
    'IMAGES_PATH_DIR' => 0,
    'no_of_page' => 0,
    'link_pagination' => 0,
    'link_ajax' => 0,
    'page_no' => 0,
    'start' => 0,
    'min_page' => 0,
    'max_page' => 0,
    'images_path_dir' => 0,
    's_asset_id' => 0,
    's_file_type' => 0,
    's_name' => 0,
    's_description' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'sort' => 0,
    'arrow_id' => 0,
    'arrow_name' => 0,
    'arrow_type' => 0,
    'arrow_size' => 0,
    'arrow_description' => 0,
    'arrow_date' => 0,
    'allAssets' => 0,
    'assets' => 0,
    'assets_path_dir' => 0,
    'source' => 0,
    'input_file_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c5849d3c095_09580277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c5849d3c095_09580277')) {function content_572c5849d3c095_09580277($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder_admin']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<head>
            <?php if ($_smarty_tpl->tpl_vars['current_assets']->value==1) {?>
                <?php echo '<script'; ?>
>
                    //get threads for some defaults links
                    current_assets();
                <?php echo '</script'; ?>
>
            <?php }?>
</head>
<body>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
        <h2 class="tell_pb left"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h2>

            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder_admin']->value)."/admin_filter_browse_assets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <input type="hidden" name="CKEditorFuncNum" id="CKEditorFuncNum" value="<?php echo $_smarty_tpl->tpl_vars['CKEditorFuncNum']->value;?>
">
            
            <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGES_PATH_DIR']->value;?>
/loading.gif"></div>
            <div class="clear">&nbsp;</div>



            <div id="list_results">            



            <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
                <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
                <div class="paginare">
                    <ul class="list_pagination">
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_browse_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['no_of_page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['no_of_page']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
                            <?php if ($_smarty_tpl->tpl_vars['start']->value>=$_smarty_tpl->tpl_vars['min_page']->value&&$_smarty_tpl->tpl_vars['start']->value<=$_smarty_tpl->tpl_vars['max_page']->value) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['start']->value==$_smarty_tpl->tpl_vars['page_no']->value) {?> class="curent_item"<?php }?>>
                                    <a   href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
" class="pagination_item <?php if ($_smarty_tpl->tpl_vars['start']->value==$_smarty_tpl->tpl_vars['page_no']->value) {?> curent_item<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
" onclick="pagination_browse_assets('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                                </li>
                            <?php }?>
                        <?php }} ?>
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_browse_assets('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            <?php }?>

            <div class="clear">&nbsp;</div>
            <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['images_path_dir']->value;?>
/loading.gif"></div>
            <div class="clear">&nbsp;</div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr> 
                        <th class="filter filter_user_id format_id">Id
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=asset_id&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_id']->value;?>
"></span>
                            </a>                
                        </th>
                         
                        <th class="filter filter_user_name format_name">Public name
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=public_name&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_name']->value;?>
"></span>
                            </a>
                        </th>
                        <th class="format_type">Type
                           <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=file_type&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_type']->value;?>
"></span>
                            </a>
                        </th>
                        <th>Size
                           <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=file_size&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_size']->value;?>
"></span>
                            </a>
                        </th>
                        
                        <th class="filter filter_user_name format_name">Description
                           <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=file_description&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_description']->value;?>
"></span>
                            </a>
                        </th>
                        <th class="format_creation_date">Created Date
                           <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_file_type']->value;?>
&filter=creation_date&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_date']->value;?>
"></span>
                            </a>
                        </th>
                        <th class="format_dimensions">Dimensions</th>
                        <th>Download</th>
                        <th class="format_actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['assets'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['assets']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allAssets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['assets']->key => $_smarty_tpl->tpl_vars['assets']->value) {
$_smarty_tpl->tpl_vars['assets']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
</td>                    
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['public_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['file_type'];?>

                              <?php if ($_smarty_tpl->tpl_vars['assets']->value['file_type']=='image') {?>
                              <br />
                              <?php echo $_smarty_tpl->tpl_vars['assets']->value['file_extension'];?>

                              <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['file_size'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['file_description'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['creation_date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['assets']->value['image_width'];?>
 x <?php echo $_smarty_tpl->tpl_vars['assets']->value['image_height'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['assets']->value['file_type']=='image') {?><img src="../assets/<?php echo $_smarty_tpl->tpl_vars['assets']->value['local_file_name'];?>
" width="180"> <?php }?><a href="../assets/<?php echo $_smarty_tpl->tpl_vars['assets']->value['local_file_name'];?>
" target="_blank">Download</a></td>
                            <td width="100">
                            
                            <button name="select_asset" onclick="select_asset(this);" class="select_asset btn btn-default" url-path="<?php echo $_smarty_tpl->tpl_vars['assets_path_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['assets']->value['local_file_name'];?>
" img-alt="<?php echo $_smarty_tpl->tpl_vars['assets']->value['file_description'];?>
">Select asset</button>
                            
                            </td>

                        </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars['assets']->_loop) {
?>
                        <tr>
                            <td colspan="9" class="text-center">No results</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
                <div class="paginare  bottom">
                    <ul class="list_pagination">
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_browse_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['no_of_page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['no_of_page']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
                            <?php if ($_smarty_tpl->tpl_vars['start']->value>=$_smarty_tpl->tpl_vars['min_page']->value&&$_smarty_tpl->tpl_vars['start']->value<=$_smarty_tpl->tpl_vars['max_page']->value) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['start']->value==$_smarty_tpl->tpl_vars['page_no']->value) {?> class="curent_item"<?php }?>>
                                    <a   href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
" class="pagination_item <?php if ($_smarty_tpl->tpl_vars['start']->value==$_smarty_tpl->tpl_vars['page_no']->value) {?> curent_item<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
botom" onclick="pagination_browse_assets('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                                </li>
                            <?php }?>
                        <?php }} ?>
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_browse_assets('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            <?php }?>

        </div>

    </div>

</div>
<?php echo '<script'; ?>
>
    //var source = '<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
';
    //var input_file_id = '<?php echo $_smarty_tpl->tpl_vars['input_file_url']->value;?>
';
    var source = '';
    var input_file_id = '<?php echo $_smarty_tpl->tpl_vars['input_file_url']->value;?>
';
<?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function select_asset(element)
        {
            if (source == '' || typeof source == 'undefined') {
                source = getUrlParameter('source');
            }
            if (input_file_id == '') {
                input_file_id = getUrlParameter('input_file_url');
            }
            // console.log(source);
            if (source == '' || typeof source == 'undefined')
            {
                source = 'ckeditor';
            }
            // console.log(source);
            // console.log(input_file_id);

            var fileSrc = $(element).attr("url-path");
            var fileSrcAlt = $(element).attr("img-alt");
            if (source == 'ckeditor')
            {
                var CKEditorFuncNum =$("#CKEditorFuncNum").val();
                window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, fileSrc);
                window.opener.$("label:contains('Alternative Text')").next().find("input[class='cke_dialog_ui_input_text']").val(fileSrcAlt);
            }
            else
            {

                // Set them to the parent window
                window.opener.$("#"+input_file_id).val(fileSrc);
                if (input_file_id == 'edit_form_video_image_url') // need to set a preview for Edit Form Fields
                {
                    window.opener.$("#edit_form_video_image_url_preview").attr('src',fileSrc);
                }
            }

            // Close the popup
            window.close();
        }
        /*  $(document).ready(function()
         {
         $( ".select_asset" ).click(function() {

         //select_asset($(this));

         console.log(source);
         console.log(input_file_id);

         if (source == '') {
         source = getUrlParameter('source');
         }
         if (input_file_id == '') {
         input_file_id = getUrlParameter('input_file_url');
         }
         if (source == '')
         {
         source == 'ckeditor';
         }
         console.log(source);
         console.log(input_file_id);

         var fileSrc = $(this).attr("url-path");
         var fileSrcAlt = $(this).attr("img-alt");
         if (source == 'ckeditor')
         {
         var CKEditorFuncNum =$("#CKEditorFuncNum").val();
         window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, fileSrc);
         window.opener.$("label:contains('Alternative Text')").next().find("input[class='cke_dialog_ui_input_text']").val(fileSrcAlt);
         }
         else
         {

         // Set them to the parent window
         window.opener.$("#"+input_file_id).val(fileSrc);
         if (input_file_id == 'edit_form_video_image_url') // need to set a preview for Edit Form Fields
         {
         window.opener.$("#edit_form_video_image_url_preview").attr('src',fileSrc);
         }
         }

         // Close the popup
         //window.close();

         });
         });*/

    <?php echo '</script'; ?>
>

</body>
</html>

<?php }} ?>
