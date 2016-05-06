<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:50:22
         compiled from "/var/www/akiva/tpl/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:487962247572ca11eed76d1-37805995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2878c877346907d0795973e772cbf1d0a2f1c4b0' => 
    array (
      0 => '/var/www/akiva/tpl/blog.tpl',
      1 => 1462462233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '487962247572ca11eed76d1-37805995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'action' => 0,
    'page_title' => 0,
    'articleInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca11eeeb817_23271293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca11eeeb817_23271293')) {function content_572ca11eeeb817_23271293($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<header>

</header>
<?php if ($_smarty_tpl->tpl_vars['action']->value=="home") {?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<div class="master-wrapper">
	<div class="row">
		<div class="col-lg-3">
			<div class="articles_menu" style="border-right:1px solid #ccc;">
				<ul><li><a href="?action=all-blogs" <?php if ($_smarty_tpl->tpl_vars['action']->value=='all-blogs') {?>class="active_art"<?php }?>>All Articles</a></li></ul>
				<?php if ($_smarty_tpl->tpl_vars['action']->value=='all-blogs') {?>
					
				<?php } else { ?>

				<?php }?>
					<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/articles-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				
			</div>
		</div>
		<div class="col-lg-9" >
			
			<?php if ($_smarty_tpl->tpl_vars['action']->value=='all-blogs') {?>

			<?php echo '<script'; ?>
>
			current_front_articles();
			<?php echo '</script'; ?>
>

			<h1><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h1>

			<div id="list_results">
	
		    </div>
		    
		    </div>
			<?php } else { ?>
				<h1 itemprop="name"><?php echo $_smarty_tpl->tpl_vars['articleInfo']->value['title'];?>
</h1>

		        <?php echo $_smarty_tpl->tpl_vars['articleInfo']->value['version_1'];?>

	        <?php }?>
	        
		</div>



	</div>
</div>

<a href="#0" class="cd-top">Top</a>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
