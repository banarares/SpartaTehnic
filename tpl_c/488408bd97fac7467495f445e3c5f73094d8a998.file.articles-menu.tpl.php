<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:50:22
         compiled from "/var/www/akiva//tpl/articles-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1486890131572ca11ef0a915-19042326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '488408bd97fac7467495f445e3c5f73094d8a998' => 
    array (
      0 => '/var/www/akiva//tpl/articles-menu.tpl',
      1 => 1462467755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1486890131572ca11ef0a915-19042326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'root_url' => 0,
    'articles_menu' => 0,
    'left_menus' => 0,
    'left_articles' => 0,
    'article_slug' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca11ef1ce50_69784847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca11ef1ce50_69784847')) {function content_572ca11ef1ce50_69784847($_smarty_tpl) {?>    <ul>
        <li  <?php if ($_smarty_tpl->tpl_vars['action']->value=='blog') {?>class="active_art" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
?action=blog">Blog</a></li>

        <?php  $_smarty_tpl->tpl_vars['left_menus'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_menus']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_menus']->key => $_smarty_tpl->tpl_vars['left_menus']->value) {
$_smarty_tpl->tpl_vars['left_menus']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['left_menus']->value['category_title']!='Home'&&$_smarty_tpl->tpl_vars['left_menus']->value['category_title']!='Home') {?>
                <li class="pure-menu-heading"><?php echo $_smarty_tpl->tpl_vars['left_menus']->value['category_title'];?>
</li>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['left_menus']->value['articles'])) {?>
                <?php  $_smarty_tpl->tpl_vars['left_articles'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_articles']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['left_menus']->value['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_articles']->key => $_smarty_tpl->tpl_vars['left_articles']->value) {
$_smarty_tpl->tpl_vars['left_articles']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['left_articles']->value['title']!='') {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['left_articles']->value['slug']==$_smarty_tpl->tpl_vars['article_slug']->value) {?>class="active_art" <?php }?>><a href="?q=<?php echo $_smarty_tpl->tpl_vars['left_articles']->value['slug'];?>
" onclick="go_to_url_onclick(this)" ><?php echo $_smarty_tpl->tpl_vars['left_articles']->value['title'];?>
</a></li>
                    <?php }?>
                <?php } ?>
            <?php }?>
        <?php } ?>

    </ul><?php }} ?>
