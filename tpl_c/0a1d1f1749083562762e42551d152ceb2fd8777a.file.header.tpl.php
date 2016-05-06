<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:50:22
         compiled from "/var/www/akiva//tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1316337652572ca11eeee1a3-50094408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1d1f1749083562762e42551d152ceb2fd8777a' => 
    array (
      0 => '/var/www/akiva//tpl/header.tpl',
      1 => 1462449209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1316337652572ca11eeee1a3-50094408',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'root_url' => 0,
    'sitekey' => 0,
    'has_escaped_fragment' => 0,
    'canonical_url' => 0,
    'tpl_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572ca11ef02a15_50316477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572ca11ef02a15_50316477')) {function content_572ca11ef02a15_50316477($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/css/normalize.css">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/css/skeleton.css">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/css/skeleton.css">
  


  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/images/favicon.png">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- JQUERY -->
  <?php echo '<script'; ?>
   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- Latest compiled and minified JavaScript -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/bxslider/jquery.bxslider.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">

  <!-- Google Api -->
  <?php echo '<script'; ?>
 type="text/javascript" src="https://www.google.com/recaptcha/api.js"> <?php echo '</script'; ?>
>
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/css/stylesheet.css">

  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/SlickNav/scss/slicknav.scss" />
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/SlickNav/jquery.slicknav.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
      //var sitekey = '<?php echo $_smarty_tpl->tpl_vars['sitekey']->value;?>
';
      var root_url = '<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
';
  <?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">

  <?php echo '<script'; ?>
 type="text/javascript"  src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/bxslider/jquery.bxslider.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/bxslider/jquery.bxslider.min.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/js/jquery.slicknav.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/js/main.js"><?php echo '</script'; ?>
>

    <?php if ($_smarty_tpl->tpl_vars['has_escaped_fragment']->value) {?>
        <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['canonical_url']->value;?>
" />
    <?php }?>

</head>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
