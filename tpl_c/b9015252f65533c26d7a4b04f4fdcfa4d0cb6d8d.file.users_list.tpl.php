<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 14:38:38
         compiled from "/var/www/akiva//tpl/admin-1000/users_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2795269815720a4be805963-05035120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9015252f65533c26d7a4b04f4fdcfa4d0cb6d8d' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/users_list.tpl',
      1 => 1461755645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2795269815720a4be805963-05035120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_thread' => 0,
    'link_pagination' => 0,
    's_user_id' => 0,
    's_type' => 0,
    's_name' => 0,
    's_ip' => 0,
    's_email' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    's_date_usergroup' => 0,
    'sort' => 0,
    'link_ajax' => 0,
    'arrow_id' => 0,
    'arrow_name' => 0,
    'arrow_email' => 0,
    'arrow_date' => 0,
    'arrow_ip' => 0,
    'arrow_usergroup' => 0,
    'allUsers' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720a4be8582d4_22268253',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720a4be8582d4_22268253')) {function content_5720a4be8582d4_22268253($_smarty_tpl) {?>
   
<div id="list_results">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   


     <input type="hidden" name="sort" value="0" form="filter" /> 
                       

    <div class="clear">&nbsp;</div>
    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>

 
                   
    <div class="table-responsive">
        
        <table class="table table-hover">
       
            <thead>
            <tr>
                
                <th class="filter filter_user_id format_id">Id                
                    <div class="button-right-wrapper" >
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=user_id&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_id']->value;?>
"></span></a>                
                </th>
                <th class="filter filter_user_name format_name">UserName 
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=user_name&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_name']->value;?>
"></span></a>
                </th>
                <th class="filter filter_email format_name">Email 
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=email&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_email']->value;?>
"></span></a>
                </th>
                <th class="filter filter_user_ip row format_creation_date">Created date 
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=created_date&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_date']->value;?>
"></span></a>

                </th>
                <th class="filter filter_user_ip format_ip">IP
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=ip_address&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_ip']->value;?>
"></span></a>
                </th>
                <th class="filter filter_usergroup format_name">Usergroup 
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1&s_user_id=<?php echo $_smarty_tpl->tpl_vars['s_user_id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=usergroup_id&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_ip=<?php echo $_smarty_tpl->tpl_vars['s_ip']->value;?>
&s_email=<?php echo $_smarty_tpl->tpl_vars['s_email']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&s_usergroup=<?php echo $_smarty_tpl->tpl_vars['s_date_usergroup']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1"><span class="<?php echo $_smarty_tpl->tpl_vars['arrow_usergroup']->value;?>
"></span></a>
                </th>



                <input type="hidden" name="action" value="admin-users" form="filter" />

                <th class="format_actions">Actions</th>
                
            </tr>
            </thead>
            <tbody>

   
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allUsers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created_date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['ip_address'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['usergroup_name'];?>
</td>

                    <td>
                        <a href="javascript:void(0);" user_id="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" data-open="modal" title="edit" class="edit_user" onclick="admin_item(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
, 'edit', event);"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" user_id="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" title="delete" class="delete_item"  onclick="delete_admin(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                    </td>



                </tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['user']->_loop) {
?>
                <tr>
                    <td colspan="7" class="text-center">No results</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_pagination_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>




                                  


                       
         <?php }} ?>
