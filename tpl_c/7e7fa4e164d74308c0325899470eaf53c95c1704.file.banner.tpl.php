<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 16:07:12
         compiled from "/var/www/akiva//tpl/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:721121091572c9700a217d9-03311504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e7fa4e164d74308c0325899470eaf53c95c1704' => 
    array (
      0 => '/var/www/akiva//tpl/banner.tpl',
      1 => 1461771937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '721121091572c9700a217d9-03311504',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c9700a22a94_40320066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c9700a22a94_40320066')) {function content_572c9700a22a94_40320066($_smarty_tpl) {?><!-- Serch From Banner Style-->
<div class="row" >
  <div class="col-sd-12 banner" >
    <div class="sprite sprite-banner  default-view-wrapper text-center">
      <div class="sprite-black-wash">
        <div class="banner_title_wrapper" >
          <h1  class="banner_title">It's always better to share</h1>
          <h3  class="banner_subtitle">Find what's available for sharing</h3>

            <div class="sprite sprite-searc-box align-center" >
              <div class="sprite sprite-search-bar text-left"  >
                <label for="item" >Item</label>
                <input type="text" placeholder="eg. wheelchair, leaf blower" id="item"  name="item" />

                <label for="where">Where</label>
                <input type="text" placeholder="City, State, Zip" id="where"  name="where" />

                <button type="submit" class="search-button-wrapper ">
                  <span class="sprite-search-icon search_style" ></span> Search
                </button>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php }} ?>
