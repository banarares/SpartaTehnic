<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 12:11:08
         compiled from "/var/www/akiva//tpl/admin-1000/emails_management_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16520838475720822c0ba2d9-40854399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b277eddb823dd71bf792e4eb279d17745bde8f2' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/emails_management_list.tpl',
      1 => 1460624412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16520838475720822c0ba2d9-40854399',
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
    'list_of_emails' => 0,
    'email_management' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720822c10c2b2_28964517',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720822c10c2b2_28964517')) {function content_5720822c10c2b2_28964517($_smarty_tpl) {?><div id="list_results">

    <?php if ($_smarty_tpl->tpl_vars['no_of_page']->value>0) {?>
        <div class="last_item" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" class="to_left_left" onclick="pagination_emails('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
" onclick="pagination_emails('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?>
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_emails('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>

    <div class="clear">&nbsp;</div>
    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Creation date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['email_management'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['email_management']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_of_emails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['email_management']->key => $_smarty_tpl->tpl_vars['email_management']->value) {
$_smarty_tpl->tpl_vars['email_management']->_loop = true;
?>
                <tr >
                    <td><?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
</td>
                    <td><span style="margin-right: 5px;" id="icon-status-<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
" class="glyphicon <?php if ($_smarty_tpl->tpl_vars['email_management']->value['status']==1) {?> <?php } else { ?> glyphicon-alert text-error<?php }?>"></span><div style="display: inline-block;" id="open-position-full_name-<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['email_management']->value['full_name'];?>
</div></td>
                    <td><div id="open-position-email-<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['email_management']->value['email'];?>
</div></td>
                    <td><div id="open-position-creation-date-<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['email_management']->value['creation_date'];?>
</div></td>

                    <td>
                        <a href="javascript:void(0);" current-status="<?php echo $_smarty_tpl->tpl_vars['email_management']->value['status'];?>
" id="update-status-<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
" title="<?php if ($_smarty_tpl->tpl_vars['email_management']->value['status']==1) {?>Disable<?php } else { ?>Enable<?php }?>" <?php if ($_smarty_tpl->tpl_vars['email_management']->value['status']==1) {?>class="text-success"<?php } else { ?>class="text-error"<?php }?> onclick="update_email_management_status(<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
, event);"><span aria-hidden="true" class="glyphicon <?php if ($_smarty_tpl->tpl_vars['email_management']->value['status']==1) {?> glyphicon-ok<?php } else { ?> glyphicon-ok<?php }?>"></span></a> &nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0);" title="Edit" onclick="edit_email_management(<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
);" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" title="Delete" onclick="remove_email_management(<?php echo $_smarty_tpl->tpl_vars['email_management']->value['email_management_id'];?>
, event);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>

            <?php }
if (!$_smarty_tpl->tpl_vars['email_management']->_loop) {
?>
                <tr>
                    <td colspan="5" class="text-center">No results</td>
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
pagina=1" class="to_left_left" onclick="pagination_emails('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value-1;?>
" class="to_left" onclick="javascript:prev_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
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
botom" onclick="pagination_emails('<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['start']->value;?>
</a>
                        </li>
                    <?php }?>
                <?php }} ?>
                <li>
                    <a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['page_no']->value+1;?>
" class="to_right" onclick="javascript:next_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
" class="to_right_right" onclick="pagination_emails('<?php echo $_smarty_tpl->tpl_vars['no_of_page']->value;?>
');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    <?php }?>

</div>


<?php }} ?>
