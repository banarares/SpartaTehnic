<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:21
         compiled from "/var/www/akiva//tpl/admin-1000/admin_articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120614574572ca2fd2bd957-91977446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0eadbd8070b0b22144396e345c894d269b3e4d4' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_articles.tpl',
      1 => 1462264330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120614574572ca2fd2bd957-91977446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_articles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fd2cccd1_79678840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fd2cccd1_79678840')) {function content_572ca2fd2cccd1_79678840($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['current_articles']->value==1) {?>
    <?php echo '<script'; ?>
> 
        current_articles();
    <?php echo '</script'; ?>
>
<?php }?>
<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Blog Management</h2>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="article_item('', 'add', event);">Add New Article </a></div>

            <div class="clear" style="height:15px;"> </div>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_filter_articles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div class="clear" style="height:15px;"> </div>

                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/articles_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="articleModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="articleModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_article('frm_article');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="showArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="showArticleModalLabel">Article - All versions</h4>
            </div>
            <div class="modal-body" id="showArticleModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<?php echo '<script'; ?>
>
    $(document).ready(function()
    {
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location = "/admin-1000/?action=admin-articles";
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
