<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:12
         compiled from "/var/www/akiva//tpl/admin-1000/categories-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1307201974572ca2f4726f38-70685795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eca892f7ebce22bad0c7b04c7bb6f0c5834cda81' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/categories-list.tpl',
      1 => 1462355549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1307201974572ca2f4726f38-70685795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'no_of_page' => 0,
    'link_pagination' => 0,
    'link_ajax' => 0,
    'min_page' => 0,
    'type' => 0,
    'page_no' => 0,
    'start' => 0,
    'max_page' => 0,
    's_id' => 0,
    's_name' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'sort' => 0,
    'status' => 0,
    'arrow_id' => 0,
    'arrow_name' => 0,
    'arrow_status' => 0,
    'arrow_date' => 0,
    'allCategories' => 0,
    'category' => 0,
    'filter' => 0,
    'total_categories' => 0,
    'allCategorieslist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f47a9cf2_14720535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f47a9cf2_14720535')) {function content_572ca2f47a9cf2_14720535($_smarty_tpl) {?>
<div id="list_results">

                <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
                    <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
                    <div class="paginare">
                        <ul class="list_pagination">
                            <li>
                                <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_categories(<?php echo $_smarty_tpl->tpl_vars['min_page']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                            </li>
                            <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_categories('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
" onclick="pagination_categories('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                                    </li>
                                <?php }?>
                            <?php }} ?>
                            <li>
                                <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_categories('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                            <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_categories('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                    </div>
                <?php }?>
            <div class="clear" ></div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="100">&nbsp; &nbsp;Id
                            <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=category_id#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_id']->value;?>
"></span></a>
                            </div>   
                        </th>
                        <th >Name
                            <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=name#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_name']->value;?>
"></span></a>
                            </div>  
                        </th>
                        <th  width="90">Status
                            <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=status#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_status']->value;?>
"></span></a>
                            </div>  
                        </th>
                        <th width="210">Created Date
                            <div class="button-right-wrapper" >
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&filter=creation_date#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_date']->value;?>
"></span></a>
                            </div> 
                        </th>
                        <th width="100">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                        <tr>
                            <td ><div style="width:25px;text-align:right;display:inline-block;margin:0;padding:0;"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
</div>&nbsp;
                            <?php if (($_smarty_tpl->tpl_vars['s_name']->value=='undefined'||$_smarty_tpl->tpl_vars['s_name']->value=='')&&($_smarty_tpl->tpl_vars['status']->value=='undefined'||$_smarty_tpl->tpl_vars['status']->value=='')&&($_smarty_tpl->tpl_vars['s_date_start']->value==''||$_smarty_tpl->tpl_vars['s_date_start']->value=='undefined')&&($_smarty_tpl->tpl_vars['s_date_end']->value==''||$_smarty_tpl->tpl_vars['s_date_end']->value=='undefined')&&($_smarty_tpl->tpl_vars['filter']->value=='undefined'||$_smarty_tpl->tpl_vars['filter']->value=='')) {?> 


                                <?php if ($_smarty_tpl->tpl_vars['category']->value['category_id']==$_smarty_tpl->tpl_vars['allCategorieslist']->value[$_smarty_tpl->tpl_vars['total_categories']->value]) {
} else { ?><a href="javascript:void(0);" category_id="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" title="Move DOWN" class="move_menu_item" onclick="move_category_item(<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
, 'after', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-down" title="Move DOWN"></span></a> &nbsp;<?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['category']->value['category_id']==$_smarty_tpl->tpl_vars['allCategorieslist']->value[0]) {
} else { ?><a href="javascript:void(0);" category_id="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" title="Move UP" class="move_menu_item" onclick="move_category_item(<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
, 'before', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-up" title="Move UP"></span></a> &nbsp;<?php }?>

                                

                            <?php } else { ?>                            
                            

                            <?php }?>
                            </td>
                            <td ><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
                            <!--<td><?php echo $_smarty_tpl->tpl_vars['category']->value['display_order'];?>
</td>-->
                            <td ><?php if ($_smarty_tpl->tpl_vars['category']->value['status']==1) {?>Active<?php } else { ?>Inactive<?php }?></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['creation_date'];?>
</td>

                            <td>
                                <a href="javascript:void(0);" category_id="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" title="edit" class="edit_user" onclick="category_item(<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                <a href="javascript:void(0);" category_id="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" title="delete" class="delete_category_item"  onclick="delete_category_item(<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
, 'to_categorys');"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                            </td>
                        </tr>
                         <?php }
if (!$_smarty_tpl->tpl_vars['category']->_loop) {
?>
                        <tr>
                            <td colspan="6" class="text-center">No results</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="clear" ></div>
             <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
                <div class="paginare  bottom">
                    <ul class="list_pagination">
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_categories('1','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_categories('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
botom" onclick="pagination_categories('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                                </li>
                            <?php }?>
                        <?php }} ?>
                        <li>
                            <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_categories('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_categories('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            <?php }?>
 </div><?php }} ?>
