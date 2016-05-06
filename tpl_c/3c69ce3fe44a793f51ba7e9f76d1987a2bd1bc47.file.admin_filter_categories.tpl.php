<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:11
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1216322495572ca2f39c2016-87109711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c69ce3fe44a793f51ba7e9f76d1987a2bd1bc47' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter_categories.tpl',
      1 => 1461938270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1216322495572ca2f39c2016-87109711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    's_id' => 0,
    's_name' => 0,
    'status' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'admin_categories_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2f39d20e3_87697764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2f39d20e3_87697764')) {function content_572ca2f39d20e3_87697764($_smarty_tpl) {?>    <form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#pagina=1" method="get" name="filter_categories" id="filter_categories"></form>
    <div class="filter-wrapper">
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter_categories" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="<?php if ($_smarty_tpl->tpl_vars['s_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_categories" type="text" name="s_name" placeholder="category name" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_name']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_name']->value;
}?>" />
            </div>
            <div class="col-lg-2"><br />
                <select class="form-control" form="filter_categories" name="status" id="status" >
                    <option value="" <?php if ($_smarty_tpl->tpl_vars['status']->value!=='1'||$_smarty_tpl->tpl_vars['status']->value!=='0') {?> selected <?php }?> >Select status</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value=='1') {?> selected <?php }?> >Active</option>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['status']->value=='0') {?> selected <?php }?> >Inactive</option>
                </select>                
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_categories" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" >
                
                    <input form="filter_categories" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_categories" type="hidden" name="action"  value="admin-categories"  />

                <input form="filter_categories" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_categories_url']->value;?>
';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_categories" />
<?php }} ?>
