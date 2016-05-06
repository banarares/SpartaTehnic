<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:50:35
         compiled from "/var/www/akiva//tpl/admin-1000/admin_errors_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:838302516572ca12bab4d22-14339269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '167749581ee1794cb60f8791e486d5d02c179d61' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_errors_list.tpl',
      1 => 1460624393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '838302516572ca12bab4d22-14339269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allErrors' => 0,
    'error' => 0,
    'no_of_page' => 0,
    's_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca12bac0e23_65714032',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca12bac0e23_65714032')) {function content_572ca12bac0e23_65714032($_smarty_tpl) {?><div class="table-responsive">
    <table class="table table-hover" id="errors_table">
        <thead>
        <tr>
            <th>Crt.</th>
            <th>Log time</th>
            <th>Severity</th>
            <th>Description</th>
            <th>Location</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allErrors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['error']->value['event_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['error']->value['log_time'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['error']->value['severity'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['error']->value['error_description'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['error']->value['code_location_info'];?>
</td>
            </tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['error']->_loop) {
?>
            <tr>
                <td colspan="5" class="text-center">No errors for the moment</td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

<?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>1) {?>
    <div class="paginare  bottom" id="paginare_bottom">
        <div id="more_results_container"><a href="javascript:void(0);" id="more_results" onclick="pagination_errors('<?php echo $_smarty_tpl->tpl_vars['s_page']->value+1;?>
','<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');">See more results</a></div>
    </div>
<?php } else { ?>
    <div class="paginare  bottom" id="paginare_bottom">
        <div id="more_results_container">These are all the results</div>
    </div>
<?php }?>
<?php }} ?>
