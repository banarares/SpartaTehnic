<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 14:38:38
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15217489495720a4be2c2823-79905001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c56a4920ad8656a39d707e72822948ce1ab8ae95' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter.tpl',
      1 => 1461745076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15217489495720a4be2c2823-79905001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    'link_ajax' => 0,
    's_user_id' => 0,
    's_name' => 0,
    's_email' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    's_ip' => 0,
    's_usergroup' => 0,
    'key' => 0,
    'usergroups' => 0,
    'usergroup' => 0,
    'admin_users_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720a4be2da7c1_74657991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720a4be2da7c1_74657991')) {function content_5720a4be2da7c1_74657991($_smarty_tpl) {?>    <div class="filter-wrapper">
        <form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['link_ajax']->value;?>
pagina=1" method="get"  name="filter" id="filter"></form>
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter" type="number" autocomplete="off" min="0" placeholder="id" class="search_user_id" name="s_user_id" value="<?php if ($_smarty_tpl->tpl_vars['s_user_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_user_id']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter" type="text" autocomplete="off" name="s_name" placeholder="user name" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_name']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_name']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter" type="text" autocomplete="off" name="s_email" placeholder="email" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_email']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_email']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                
                    <input type="text" form="filter" autocomplete="off" name="s_date_start"  placeholder="start date"  id="datepicker_start" class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" />
                
                    <input type="text" form="filter" autocomplete="off" name="s_date_end"  placeholder="end date"  id="datepicker_end" class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" />
               
            </div>
            <div class="col-lg-2"><br />
                    <input form="filter" type="text" autocomplete="off" name="s_ip" placeholder="ip" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_ip']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_ip']->value;
}?>" />
                  
                    <input form="filter" type="hidden" autocomplete="off" name="action" value="admin-users" />
                    
            </div>
            <div class="col-lg-2"><br />
                        <select name="s_usergroup" class="form-control" form="filter" id="usergroup_selection">
                             <option  value="undefined" <?php if ($_smarty_tpl->tpl_vars['s_usergroup']->value==$_smarty_tpl->tpl_vars['key']->value) {?>style="display:block;" selected<?php } else { ?>style="display:hidden;"<?php }?> >Select Usergroup</option> 
                            
                                <?php  $_smarty_tpl->tpl_vars["usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["usergroup"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['usergroups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["usergroup"]->key => $_smarty_tpl->tpl_vars["usergroup"]->value) {
$_smarty_tpl->tpl_vars["usergroup"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["usergroup"]->key;
?> 
                            <option value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['s_usergroup']->value==$_smarty_tpl->tpl_vars['usergroup']->value['usergroup_id']) {?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['usergroup_name'];?>
</h3></option>
                                <?php } ?>
                               
                        </select>

            </div>
            <div class="col-lg-1" ><br />
                <input form="filter" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_users_url']->value;?>
';"  >Reset</button>
            </div>        
        </div>        
    </div>


<?php }} ?>
