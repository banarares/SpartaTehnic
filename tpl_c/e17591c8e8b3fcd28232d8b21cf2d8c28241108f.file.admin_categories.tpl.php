<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:11
         compiled from "/var/www/akiva//tpl/admin-1000/admin_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:355800909572ca2f397f304-92280923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e17591c8e8b3fcd28232d8b21cf2d8c28241108f' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_categories.tpl',
      1 => 1462264348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '355800909572ca2f397f304-92280923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f398c976_68005450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f398c976_68005450')) {function content_572ca2f398c976_68005450($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['current_categories']->value==1) {?>
    <?php echo '<script'; ?>
>
    current_categories();
    <?php echo '</script'; ?>
>
<?php }?>
<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Blog Categories</h2>
            
            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="category_item('', 'add');">Add New Category </a></div>

            <div class="clear" style="height:15px;"> </div>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_filter_categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
            <div class="clear" style="height:15px;"> </div>
            
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/categories-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

           
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="categoryModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="categoryModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_category('frm_category');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<?php }} ?>
