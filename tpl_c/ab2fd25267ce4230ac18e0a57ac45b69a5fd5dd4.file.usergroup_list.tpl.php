<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:15
         compiled from "/var/www/akiva//tpl/admin-1000/usergroup_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1988098741572ca2f7478c87-45440498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab2fd25267ce4230ac18e0a57ac45b69a5fd5dd4' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/usergroup_list.tpl',
      1 => 1461756252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988098741572ca2f7478c87-45440498',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'current_thread' => 0,
    'link_pagination' => 0,
    's_id' => 0,
    's_type' => 0,
    's_name' => 0,
    's_description' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'sort' => 0,
    'link_ajax' => 0,
    'arrow_id' => 0,
    'arrow_name' => 0,
    'arrow_description' => 0,
    'arrow_date' => 0,
    'usergroup_obj' => 0,
    'usergroup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f74b45b1_65853383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f74b45b1_65853383')) {function content_572ca2f74b45b1_65853383($_smarty_tpl) {?>
<div id="list_results_usergroups">
   <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_pagination_usergroup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                  

 

     <div class="clear">&nbsp;</div>
    <div id="loading" <?php if ($_smarty_tpl->tpl_vars['current_thread']->value==1) {?>style="text-align: center; display:block; margin:25px 0;"<?php } else { ?>style="text-align: center; display:none; margin:25px 0;"<?php }?>><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>         
                

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                     <tr>
 
                                        <th class="format_id">Id <div class="button-right-wrapper">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_id']->value!==0) {?>&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=usergroup_id&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                        <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_id']->value;?>
"></span>
                                        </a>
                                        </div>
                                        </th>

                                        <th class="format_name">Usergroup <div class="button-right-wrapper">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_id']->value!==0) {?>&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=usergroup_name&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                        <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_name']->value;?>
"></span>
                                        </a>
                                        </div>

                                        </th>
                                        <th class="format_description">Description <div class="button-right-wrapper">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_id']->value!==0) {?>&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=usergroup_description&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                        <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_description']->value;?>
"></span>
                                        </a>
                                        </div>
                                        </th> 
                                        
                                        <th class="format_creation_date">Creation Date <div class="button-right-wrapper">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
&pageId=1<?php if ($_smarty_tpl->tpl_vars['s_id']->value!==0) {?>&s_id=<?php echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>&type=<?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
&filter=create_date&s_name=<?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
&s_description=<?php echo $_smarty_tpl->tpl_vars['s_description']->value;?>
&s_date_start=<?php echo $_smarty_tpl->tpl_vars['s_date_start']->value;?>
&s_date_end=<?php echo $_smarty_tpl->tpl_vars['s_date_end']->value;?>
&sort=<?php if ($_smarty_tpl->tpl_vars['sort']->value==0) {?>1<?php } else { ?>0<?php }?>#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1">
                                        <span class="<?php echo $_smarty_tpl->tpl_vars['arrow_date']->value;?>
"></span>                                        
                                        </a>
                                        </div>
                                        </th>
                                        <th class="format_actions">Actions</th>

                                        </th>
                
                                            

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['usergroup'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usergroup']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup_obj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usergroup']->key => $_smarty_tpl->tpl_vars['usergroup']->value) {
$_smarty_tpl->tpl_vars['usergroup']->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_description'];?>
  </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['creation_date'];?>
</td>
                                            <td >
                                                <a href="javascript:void(0);" usergroup_id="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
" data-open="modal" data-target="#editModal-<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
" title="edit" class="edit_user" onclick="usergroup_item(<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                                <a href="javascript:void(0);" usergroup_id="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
" title="delete" class="delete_usergroup_item"  onclick="delete_usergroup_item(<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                               
                                           

                                                                                       
                                            </td>
                                        </tr>
                                            
                                            
                                       
                                    <?php }
if (!$_smarty_tpl->tpl_vars['usergroup']->_loop) {
?>
                                        <tr>
                                            <td colspan="5" class="text-center">No results</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
  
  
             

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/admin_pagination_bottom_usergroup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo '<script'; ?>
> 

<?php echo '</script'; ?>
>

                
                



                

                

             <?php }} ?>
