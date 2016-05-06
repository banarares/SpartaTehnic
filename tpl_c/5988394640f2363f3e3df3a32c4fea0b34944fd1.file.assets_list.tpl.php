<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:18
         compiled from "/var/www/akiva//tpl/admin-1000/assets_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168014793572ca2fa761411-07774211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5988394640f2363f3e3df3a32c4fea0b34944fd1' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/assets_list.tpl',
      1 => 1462463195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168014793572ca2fa761411-07774211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'no_of_page' => 0,
    'link_pagination' => 0,
    'link_ajax' => 0,
    'page_no' => 0,
    'start' => 0,
    'min_page' => 0,
    'max_page' => 0,
    'current_thread' => 0,
    'images_path_dir' => 0,
    'selection_input' => 0,
    'source' => 0,
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
    'assets_path_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fa81a920_34184360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fa81a920_34184360')) {function content_572ca2fa81a920_34184360($_smarty_tpl) {?>

<div id="list_results">

    <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
        <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
" onclick="pagination_assets('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?>
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_assets('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>

    <div class="clear">&nbsp;</div>
    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['images_path_dir']->value;?>
/loading.gif"></div>
    <div class="clear">&nbsp;</div>
    <?php if ('source'=='ckeditor') {?>
    <input type="hidden" name="source" value="ckeditor" form="filter_assets_browse" />
    <input type="hidden" name="CKEditor" value="version_1" form="filter_assets_browse" />
    <input type="hidden" name="CKEditorFuncNum" value="1" form="filter_assets_browse" />
    <?php }?>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr> 
                <th class="filter filter_user_id format_id">Id
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
?<?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>input_file_url=social_media_image&type=image<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {?>&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1<?php } else { ?>&source=non_ckeditor<?php }
} else { ?>action=admin-assets<?php }?>&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!==0) {?>&s_asset_id=<?php echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
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
                    <?php if ($_smarty_tpl->tpl_vars['selection_input']->value) {?>
                    <button name="select_asset" onclick="select_asset(this);" class="select_asset btn btn-default" url-path="<?php echo $_smarty_tpl->tpl_vars['assets_path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['assets']->value['local_file_name'];?>
" img-alt="<?php echo $_smarty_tpl->tpl_vars['assets']->value['file_description'];?>
">Select asset</button>
                    <?php } else { ?>
                    
                        <a href="javascript:void(0);" current-status="<?php echo $_smarty_tpl->tpl_vars['assets']->value['is_moderated'];?>
" id="update-status-<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
" asset_id="<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
" title="<?php if ($_smarty_tpl->tpl_vars['assets']->value['is_moderated']==1) {?>Disable<?php } else { ?>Enable<?php }?>" <?php if ($_smarty_tpl->tpl_vars['assets']->value['is_moderated']==1) {?>class="text-success"<?php } else { ?>class="text-error"<?php }?> onclick="update_asset_moderation_status(<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['assets']->value['is_moderated'];?>
);"><span aria-hidden="true" class="glyphicon <?php if ($_smarty_tpl->tpl_vars['assets']->value['is_moderated']==1) {?> glyphicon-ok<?php } else { ?> glyphicon-ok<?php }?>"></span></a> &nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0);" asset_id="<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
" title="edit" class="edit_user" onclick="edit_asset_item(<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
);"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" asset_id="<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
" title="delete" class="delete_article_item"  onclick="delete_asset_item(<?php echo $_smarty_tpl->tpl_vars['assets']->value['asset_id'];?>
);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                    <?php }?>
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
pagina=1" class="to_left_left" onclick="pagination_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
botom" onclick="pagination_assets('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?>
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_assets('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>

</div>
<!-- Modal -->
<div class="modal fade" id="editAssetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editAssetModalLabel">Edit Asset</h4>
            </div>
            <div class="modal-body" id="editAssetModalBody">

            </div>
            <div class="modal-footer">
                <button form="frm_edit_asset" class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="showAssetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editAssetModalLabel">Asset - details</h4>
            </div>
            <div class="modal-body" id="showAssetModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php }} ?>
