<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-21 09:19:01
         compiled from "/var/www/akiva//tpl/search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1658279770571870d59f1929-62397321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88682c4a7fbc3f26199effb05303930cc852730c' => 
    array (
      0 => '/var/www/akiva//tpl/search_form.tpl',
      1 => 1460709123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1658279770571870d59f1929-62397321',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571870d59f2c81_17046592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571870d59f2c81_17046592')) {function content_571870d59f2c81_17046592($_smarty_tpl) {?><!-- Serch From -->
<div class="row" >
  <div class="col-sd-12 banner" >
    <div class="sprite  text-center">

        <div class="banner_title_wrapper_products blue_background" >


          <div class="sprite first-row align-center" >
              <span class="i_borrow">
                I want to borrow:
              </span>
              <span id="item_searcher" >
                <span class="sprite sprite-search-bar text-left " >
                  <label for="item" >Item</label>
                  <input type="text" placeholder="eg. wheelchair, leaf blower" id="item" class="block-small" name="item" />

                  <label for="where">Where</label>
                  <input type="text" placeholder="City, State, Zip" id="where" class="block-small"  name="where" />

                  <button type="submit" class="block-small">
                    <span class="sprite-search-icon search_style" ></span> Search
                  </button>
                </span>
              </span>
          </div>

        </div>

    </div>
  </div>
</div>
<?php }} ?>
