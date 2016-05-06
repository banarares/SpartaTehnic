<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:21
         compiled from "/var/www/akiva//tpl/admin-1000/articles_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1153316578572ca2fd9606a4-60135245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b7496c9ffa64f2454acc18ae3a791833983f835' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/articles_list.tpl',
      1 => 1462464088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1153316578572ca2fd9606a4-60135245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'no_of_page' => 0,
    'link_pagination' => 0,
    'link_ajax' => 0,
    'min_page' => 0,
    'page_no' => 0,
    'start' => 0,
    'max_page' => 0,
    'current_thread' => 0,
    'IMAGES_PATH_DIR' => 0,
    's_id' => 0,
    's_title' => 0,
    's_short_title' => 0,
    's_category_id' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'sort' => 0,
    'status' => 0,
    'arrow_id' => 0,
    'arrow_title' => 0,
    'arrow_short_title' => 0,
    'arrow_category' => 0,
    'arrow_create_date' => 0,
    'arrow_update_date' => 0,
    'allArticles' => 0,
    'article' => 0,
    'filter' => 0,
    'total_articles' => 0,
    'allArticleslist' => 0,
    'root_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fda0e0a7_12189148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fda0e0a7_12189148')) {function content_572ca2fda0e0a7_12189148($_smarty_tpl) {?><div id="list_results">


    <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
        <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_articles(<?php echo $_smarty_tpl->tpl_vars['min_page']->value;?>
);return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
" onclick="pagination_articles('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?> 
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_articles('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>
    <div class="clear">&nbsp;</div>
    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGES_PATH_DIR']->value;?>
/loading.gif"></div>
    <div class="clear">&nbsp;</div>



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="100">&nbsp;&nbsp;Id
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=article_id#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_id']->value;?>
"></span>
                            </a>
                    </div>   
                </th>
                <th>Title
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=title#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_title']->value;?>
"></span>
                            </a>
                    </div> 
                </th>
                <th width="140">Short Title
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=short_title#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_short_title']->value;?>
"></span>
                            </a>
                    </div> 
                </th> 
                <th width="120">Category
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=category_name#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_category']->value;?>
"></span>
                            </a>
                    </div> 
                </th>
                <!--<th>Version 1</th>-->
                <th width="130">Created Date
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=creation_date#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_create_date']->value;?>
"></span>
                            </a>
                    </div> </th>
                <th width="130">Last Updated Date
                    <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_title=<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
&s_short_title=<?php echo $_smarty_tpl->tpl_vars['s_short_title']->value;?>
&s_category_id=<?php echo $_smarty_tpl->tpl_vars['s_category_id']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=last_update_date#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_update_date']->value;?>
"></span>
                            </a>
                    </div>
                </th>
                <th width="120">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                <tr onclick="toggle_content(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
);">
                    <td><div style="width:25px;text-align:right;display:inline-block;"><?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
</div>
                        <?php if (($_smarty_tpl->tpl_vars['s_title']->value=='undefined'||$_smarty_tpl->tpl_vars['s_title']->value=='')&&($_smarty_tpl->tpl_vars['s_category_id']->value==''||$_smarty_tpl->tpl_vars['s_category_id']->value=='undefined')&&($_smarty_tpl->tpl_vars['s_short_title']->value==''||$_smarty_tpl->tpl_vars['s_short_title']->value=='undefined')&&($_smarty_tpl->tpl_vars['s_date_start']->value==''||$_smarty_tpl->tpl_vars['s_date_start']->value=='undefined')&&($_smarty_tpl->tpl_vars['s_date_end']->value==''||$_smarty_tpl->tpl_vars['s_date_end']->value=='undefined')&&($_smarty_tpl->tpl_vars['filter']->value=='undefined')) {?> 

                            <?php if ($_smarty_tpl->tpl_vars['article']->value['article_id']==$_smarty_tpl->tpl_vars['allArticleslist']->value[$_smarty_tpl->tpl_vars['total_articles']->value]) {
} else { ?><a href="javascript:void(0);" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="Move DOWN" class="move_menu_item" onclick="move_article_item(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
, 'after', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-down" title="Move DOWN"></span></a> &nbsp;<?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['article']->value['article_id']==$_smarty_tpl->tpl_vars['allArticleslist']->value[0]) {
} else { ?><a href="javascript:void(0);" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="Move UP" class="move_menu_item" onclick="move_article_item(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
, 'before', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-up" title="Move UP"></span></a> &nbsp;<?php }?>

                        <?php }?>
                    </td>
                    <td>
                        <span style="margin-right: 10px; width: 10px; vertical-align: top; <?php if ($_smarty_tpl->tpl_vars['article']->value['status']==1) {?> display:none; <?php } else { ?> display:inline-blockl<?php }?>" id="icon-status-<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" class="glyphicon <?php if ($_smarty_tpl->tpl_vars['article']->value['status']==1) {?> <?php } else { ?> glyphicon-alert text-error<?php }?>"></span>
                        <div style="display: inline-block; max-width:180px;" id="article-title-<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/?q=<?php echo $_smarty_tpl->tpl_vars['article']->value['slug'];?>
" class="view_live_link" title="View Live" target="_blank"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a>
                        </div>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['short_title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['category_name'];?>
</td>
                   <!-- <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1'];?>
</td>-->
                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['creation_date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1_date'];?>
</td>

                    <td>
                        <a href="javascript:void(0);" current-status="<?php echo $_smarty_tpl->tpl_vars['article']->value['status'];?>
" id="update-status-<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="<?php if ($_smarty_tpl->tpl_vars['article']->value['status']==1) {?>Inactive<?php } else { ?>Active<?php }?>" <?php if ($_smarty_tpl->tpl_vars['article']->value['status']==1) {?>class="text-success"<?php } else { ?>class="text-error"<?php }?> onclick="update_article_status(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
, event);"><span aria-hidden="true" class="glyphicon <?php if ($_smarty_tpl->tpl_vars['article']->value['status']==1) {?> glyphicon-ok<?php } else { ?> glyphicon-ok<?php }?>"></span></a> &nbsp;
                        <a href="javascript:void(0);" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="edit" class="edit_user" onclick="article_item(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
, 'edit', event);"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="all versions" class="edit_user" onclick="show_article_item(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
,event);"><span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span></a> &nbsp;

                        <a href="javascript:void(0);" article_id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
" title="delete" class="delete_article_item"  onclick="delete_article_item(<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
, event);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                    </td>
                </tr>
                <tr id="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
_content" style="display: none;"><td colspan="7"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1'];?>
</td></tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['article']->_loop) {
?>
                <tr>
                    <td colspan="6" class="text-center">No results</td>
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
pagina=1" class="to_left_left" onclick="pagination_articles('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
botom" onclick="pagination_articles('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?>
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_articles('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>

</div>

<?php }} ?>
