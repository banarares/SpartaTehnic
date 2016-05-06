<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:58:21
         compiled from "/var/www/akiva//tpl/admin-1000/admin_filter_articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1345630935572ca2fd303b64-40741555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79091984f81ab4836d6eb782b2ee556188bb201b' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/admin_filter_articles.tpl',
      1 => 1462537030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1345630935572ca2fd303b64-40741555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_pagination' => 0,
    's_id' => 0,
    's_title' => 0,
    's_short_title' => 0,
    'categories_list' => 0,
    'category' => 0,
    's_category_id' => 0,
    's_status' => 0,
    's_date_start' => 0,
    's_date_end' => 0,
    'admin_articles_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca2fd31bf97_56291448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca2fd31bf97_56291448')) {function content_572ca2fd31bf97_56291448($_smarty_tpl) {?>
<form action="<?php echo $_smarty_tpl->tpl_vars['link_pagination']->value;?>
#pagina=1" method="get" name="filter_articles" id="filter_articles"></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1"><br />
                <input form="filter_articles" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="<?php if ($_smarty_tpl->tpl_vars['s_id']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_id']->value;
}?>" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_articles" type="text" name="s_title" placeholder="title" class="search_user_name" value="<?php if ($_smarty_tpl->tpl_vars['s_title']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_title']->value;
}?>" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_articles" type="text" name="s_short_title" placeholder="short title" class="search_user_email" value="<?php if ($_smarty_tpl->tpl_vars['s_short_title']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_short_title']->value;
}?>"  />
            </div>
            <div class="col-lg-2" ><br />
    <div class="form-group">
        
        <select name="s_category_id"  form="filter_articles">
            <option value=""> - category - </option>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['category']->value['category_id']==$_smarty_tpl->tpl_vars['s_category_id']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
            <?php } ?>
        </select>
        
        <select name="s_status" form="filter_articles">
            <option value="" > - status - </option>
            <option value="0" <?php if ($_smarty_tpl->tpl_vars['s_status']->value=='0') {?>selected<?php }?>> Inactive </option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['s_status']->value=='1') {?>selected<?php }?>> Active </option>
        </select>
    </div>             
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_articles" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="<?php if ($_smarty_tpl->tpl_vars['s_date_start']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_start']->value;
}?>" >
                
                    <input form="filter_articles" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="<?php if ($_smarty_tpl->tpl_vars['s_date_end']->value!='undefined') {
echo $_smarty_tpl->tpl_vars['s_date_end']->value;
}?>" >
                
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_articles" type="hidden" name="action"  value="admin-articles"  />
                
                <input form="filter_articles" type="hidden" name="filter" value="article_id" />

                <input form="filter_articles" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_articles_url']->value;?>
';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>
<?php }} ?>
