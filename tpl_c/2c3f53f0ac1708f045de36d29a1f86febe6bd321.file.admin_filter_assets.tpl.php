<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:18
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter_assets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:931251178572ca2fa1b3508-06172210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c3f53f0ac1708f045de36d29a1f86febe6bd321' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter_assets.tpl',
      1 => 1461855896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '931251178572ca2fa1b3508-06172210',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    's_asset_id' => 0,
    's_name' => 0,
    's_description' => 0,
    's_file_type' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'admin_assets_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fa1c83f0_06226218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fa1c83f0_06226218')) {function content_572ca2fa1c83f0_06226218($_smarty_tpl) {?>    <form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#pagina=1" method="get" name="filter_assets" id="filter_assets"></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1"><br />
                <input form="filter_assets" type="number" min="0" placeholder="id" class="search_user_id" name="s_asset_id" value="<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_assets" type="text" name="s_name" placeholder="public name" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_name']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_name']->value;
}?>" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_assets" type="text" name="s_description" placeholder="description" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_description']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_description']->value;
}?>"  />
            </div>
            <div class="col-lg-2" ><br />
                            <select class="form-control" name="s_file_type" id="file_type" style="border-radius:2px;">
                                <option value="">- file type - </option>
                                <option value="image" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='image') {?>selected="selected"<?php }?> >image</option>
                                <option value="document" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='document') {?>selected="selected"<?php }?>>document</option>
                                <option value="sound" <?php if ($_smarty_tpl->tpl_vars['s_file_type']->value=='sound') {?>selected="selected"<?php }?>>sound</option>
                            </select>                
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_assets" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" >
                
                    <input form="filter_assets" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_assets" type="hidden" name="action"  value="admin-assets"  />

                <input form="filter_assets" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_assets_url']->value;?>
';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_assets" />



 
       
 <?php }} ?>
