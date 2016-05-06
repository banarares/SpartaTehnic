<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:50:31
         compiled from "/var/www/akiva//tpl/admin-1000/article-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:575974240572ca1276619a6-91654207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b6fb49846a63645b675b97a399d82413db8ac9' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/article-form.tpl',
      1 => 1462528856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '575974240572ca1276619a6-91654207',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'page_no' => 0,
    'article' => 0,
    'categories_list' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca1276850a3_86423417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca1276850a3_86423417')) {function content_572ca1276850a3_86423417($_smarty_tpl) {?><div class="error_message" id="error_message">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div>
<form name="frm_article" class="form_article_edit" id="frm_article" method="post">

    <input type="hidden" name="page_no" id="page_no" value="<?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
">

    <input type="hidden" name="article_id" id="article_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
">

    <div class="form-group">
        <label for="category_id">* Category</label>
        <select name="category_id" id="category_id">
            <option value=""> - category - </option>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['category']->value['category_id']==$_smarty_tpl->tpl_vars['article']->value['category_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">* Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">
    </div>
    <div class="form-group">
        <label for="title">Short Title</label>
        <input type="text" class="form-control" id="short_title" placeholder="Short Title" name="short_title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['short_title'];?>
">
    </div> 
    <div class="well" style="font-size:9pt;"><div><strong style="color:red;">NOTE:</strong></div> * Title and Short Title can contain alfanumeric, spaces and punctuation charachters</div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['meta_description'];?>
">
    </div>

    <div class="form-group">
        <label for="meta_description">Social media image</label>
        <div class="image_inputs">
            <input type="text" name="social_media_image" id="social_media_image" class="pb_input_title form_data_title" placeholder="Social media image url" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['social_media_image'];?>
"/>
            <?php if ($_smarty_tpl->tpl_vars['article']->value['social_media_image']!='') {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['social_media_image'];?>
" width="100">
            <?php }?>
        </div>
        <div class="image_actions">
            <button  class="image_sections" onclick="openBrowseServer('social_media_image', event);">Browse server</button> <div class="image_sections">OR</div>
            <div class="custom-file-upload">
                <input type="file" id="social_media_image_upload" name="social_media_image_upload"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="version_1">* Content</label>
        <textarea class="mesaj_content" id="version_1" name="version_1" ><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1'];?>
</textarea>
        <?php echo '<script'; ?>
>
            CKEDITOR.replace( 'version_1' );
            //$('#version_1').html(CKEDITOR);
        <?php echo '</script'; ?>
>
    </div>
    <div class="form-group small well">
        <label><strong style="color:red;">NOTE:</strong></label>
        <div>For iframe and website link, please use the following formats (in source mode)</div>
        <label>Youtube iframe</label>
        <textarea style="width: 100%; height: 80px; font-size: 12px; padding:4px"><div class="youtube_holder" >
    <iframe src="//www.youtube.com/embed/XRRnY1yQOR4?rel=0" frameborder="0" allowfullscreen></iframe>
</div></textarea>

        <label>Website link</label>
        <textarea style="width: 100%; height: 80px; font-size: 12px; padding:4px"><a href="//hemostop.ro" class="seo_tools">
    <span style="color: #333;">Visit</span> www.HemoStop.ro
</a></textarea>
    </div>
    <!--<div class="form-group">
        <label for="youtube_link">Youtube Link</label>
        <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="Youtube Link" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['youtube_link'];?>
">
    </div>-->

    <div class="form-group">
        <label >Is primary </label>
        <input class="radio-inline" type="radio" name="is_primary" value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['is_primary']=='1') {?> checked <?php }?> style="width: 30px; height: 30px; border:1px solid #444;"> Yes
        <input class="radio-inline" type="radio" name="is_primary"  value="0" <?php if ($_smarty_tpl->tpl_vars['article']->value['is_primary']=='0') {?> checked <?php }?> style="width: 30px; height: 30px; border:1px solid #444;"> No

        <div><small>If is listed on HomePage as main article</small></div>
    </div>

    <div class="form-group">
        <label for="display_order">Display order</label>
        <input type="text" class="form-control" id="display_order" name="display_order" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['display_order'];?>
">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" id="status" >
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['status']=='1') {?> selected <?php }?> >Active</option>
            <option value="0" <?php if ($_smarty_tpl->tpl_vars['article']->value['status']=='0') {?> selected <?php }?> >Inactive</option>
        </select>
    </div>


    <!--<input class="" type="button" value="Salveaza" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
<div class="error_message" id="error_message">

    <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php } else { ?>
    <?php }?>

</div><?php }} ?>
