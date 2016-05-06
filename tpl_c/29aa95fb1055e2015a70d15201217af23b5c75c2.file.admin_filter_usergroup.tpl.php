<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:14
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter_usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1329311239572ca2f6e4e826-71006217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29aa95fb1055e2015a70d15201217af23b5c75c2' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter_usergroup.tpl',
      1 => 1461755754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1329311239572ca2f6e4e826-71006217',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    's_id' => 0,
    's_name' => 0,
    's_description' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'admin_usergroup_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f6e5b4b2_38323383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f6e5b4b2_38323383')) {function content_572ca2f6e5b4b2_38323383($_smarty_tpl) {?>    <form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#pagina=1" method="get" name="filter_usergroup" id="filter_usergroup"></form>
    <div class="filter-wrapper">
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter_usergroup" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="<?php if ($_smarty_tpl->tpl_vars['s_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_usergroup" type="text" name="s_name" placeholder="user group" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_name']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_name']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_usergroup" type="text" name="s_description" placeholder="description" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_description']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_description']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_usergroup" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" >
                
                    <input form="filter_usergroup" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_usergroup" type="hidden" name="action"  value="admin-usergroup"  />

                <input form="filter_usergroup" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_usergroup_url']->value;?>
';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_usergroup" />
<?php }} ?>
