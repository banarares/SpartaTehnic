<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:07:12
         compiled from "/var/www/akiva/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1959015509572c97009f86e3-31191280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52611cea761fa42628b024b099bf4000a34116df' => 
    array (
      0 => '/var/www/akiva/tpl/index.tpl',
      1 => 1462539837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1959015509572c97009f86e3-31191280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'action' => 0,
    'search_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c9700a08d16_54055447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c9700a08d16_54055447')) {function content_572c9700a08d16_54055447($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="home") {?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=="home") {?>
<!-- CONTENT -->
<div class="master-wrapper" >
  <div class="row first-row">

      <div class="col-xs-6"  >
        <div class="sprite-bg-cell-1 cell_1_2 text-center join_us white_color" >
              <h4><?php echo $_smarty_tpl->tpl_vars['search_style']->value;?>
 "THE GOLD STANDARD IN BORROWING AND LENDING"</h4>
              <p><a href="?action=products">Lorem</a>  ipsum dolor sit amet, consectetur adipiscing elit. <br />
              In bibendum massa non ligula pharetra dictum. <br />
              Vestibulum ultrices, nulla ut molestie scelerisque</P>
        </div>
      </div>

      <div class="col-xs-6">
          <div class="cell_1_2 text-center join_us blue_background" >
              <h4 >JOIN US AS A BORROWER</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  <br />
              In bibendum massa non ligula pharetra dictum.  <br />
              Vestibulum ultrices, nulla ut molestie</P>
              <button class="sprite-button-bg " id="join_now" ><span class="join_now_text" >JOIN NOW</span></button>
          </div>
      </div>

  </div>

  <div class="clear"></div>

  <div class="row second-row">
    <a  href="#" class="sprite-box-1 cell_1_4" >
      <div class="col-xs-3 text-center  sprite-shadow-box dark-layer" >
        <h4 >PETITION FOR A LLC</h4>
        <p>Lorem ipsum dolor sit amet, consectetur </p>
      </div>
    </a>

    <a  href="#" class="sprite-box-2 cell_1_4"  >
      <div class="col-xs-3 text-center sprite-shadow-box dark-layer white_color" >
        <h4 >START A LLC</h4>
        <p>Lorem ipsum dolor sit amet, consectetur </p>
      </div>
    </a>

    <a href="?action=about" class="sprite-box-3 cell_1_4" >
      <div class="col-xs-3 text-center dark-layer sprite-shadow-box" >
        <h4 >ABOUT WE SHARE</h4>
        <p>Lorem ipsum dolor sit amet, consectetur </p>
      </div>
    </a>

    <a href="?action=all-blogs" class="cell_1_4 bg-box-4" >
      <div class="col-xs-3 text-center dark-layer sprite-shadow-box" >

          <h4 >BLOG</h4>
          <p>Lorem ipsum dolor sit amet, consectetur </p>
          <p>Lorem ipsum dolor sit amet, consectetur </p>

      </div>
    </a>

  </div>

</div>
<!-- END CONTENT -->
<?php }?>
<div class="clear-break"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
