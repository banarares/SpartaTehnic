<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 11:39:37
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter_browse_assets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134554501572c5849d49d44-06974123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d3707a73e254885cca7317c0d197fc22006f215' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter_browse_assets.tpl',
      1 => 1462375835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134554501572c5849d49d44-06974123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    's_asset_id' => 0,
    's_name' => 0,
    's_description' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'source' => 0,
    'browse_assets_list_ckeditor_url' => 0,
    'browse_assets_list_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c5849d57cb2_14632011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c5849d57cb2_14632011')) {function content_572c5849d57cb2_14632011($_smarty_tpl) {?>    <form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#pagina=1" method="get" name="filter_assets" id="filter_assets_browse" ></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1" style="display:inline-block; width:80px; vertical-align:top;">
                <input form="filter_assets_browse" type="number" min="0" placeholder="id" class="search_user_id" name="s_asset_id" value="<?php if ($_smarty_tpl->tpl_vars['s_asset_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_asset_id']->value;
}?>" />
            </div>
            <div class="col-lg-3" style="display:inline-block; width:160px; vertical-align:top;">
                <input form="filter_assets_browse" type="text" name="s_name" placeholder="public name" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_name']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_name']->value;
}?>" />
            </div>
            <div class="col-lg-3" style="display:inline-block; width:160px; vertical-align:top;">
                <input form="filter_assets_browse" type="text" name="s_description" placeholder="description" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_description']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_description']->value;
}?>"  />
            </div>

            <div class="col-lg-2" style="display:inline-block; width:160px; vertical-align:top;">
                    
                    <input form="filter_assets_browse" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" >
                
                    <input form="filter_assets_browse" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" >
               
            </div>
            <div class="col-lg-1" style="display:inline-block; width:120px; vertical-align:top;">
                <input form="filter_assets_browse" type="hidden" name="action"  value="admin-assets"  />

                <input form="filter_assets_browse" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php if ($_smarty_tpl->tpl_vars['source']->value=='ckeditor') {
echo $_smarty_tpl->tpl_vars['browse_assets_list_ckeditor_url']->value;
} else {
echo $_smarty_tpl->tpl_vars['browse_assets_list_url']->value;
}?>';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_assets_browse" />

    

 
       
 <?php }} ?>
