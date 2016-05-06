<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:16
         compiled from "/var/www/akiva//tpl/admin-1000/admin_pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:539924633572ca2f880c3c9-87053559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a7198a6d76d64774e0bef8fd672fd8542e88711' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_pagination.tpl',
      1 => 1461614518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '539924633572ca2f880c3c9-87053559',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f882cbd6_55610658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f882cbd6_55610658')) {function content_572ca2f882cbd6_55610658($_smarty_tpl) {?>
    <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
        <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_users(<?php echo $_smarty_tpl->tpl_vars['min_page']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_users('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
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
" onclick="pagination_users('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
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
" class="to_right" onclick="javascript:next_users('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_users('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?><?php }} ?>
