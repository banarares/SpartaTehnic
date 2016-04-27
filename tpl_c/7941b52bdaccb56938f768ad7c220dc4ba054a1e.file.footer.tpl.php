<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-27 13:46:34
         compiled from "/var/www/akiva//tpl/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21073766285720988aa403e5-72668756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7941b52bdaccb56938f768ad7c220dc4ba054a1e' => 
    array (
      0 => '/var/www/akiva//tpl/footer.tpl',
      1 => 1460731089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21073766285720988aa403e5-72668756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lat' => 0,
    'lng' => 0,
    'google_api_root' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5720988aa456f0_78898787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5720988aa456f0_78898787')) {function content_5720988aa456f0_78898787($_smarty_tpl) {?><!-- SUBSCRIBE SECTION -->
  <div class="subscribe">
    <h2>
      <label for="subscribe_now" id="subscribe_label">Join our newsletter</label>
      <span class="subscribe_now">
        <input type="text" id="subscribe_now" placeholder="@your-email" />
        <button type="submit" class="submit-button" >Submit</button>
      </span>
    </h2>
  </div>
<!-- END SUBSCRIBE SECTION -->

<!-- FOOTER -->
  <footer class="master-wrapper">
    <div class="row padding_20px" >
      <div class="col-md-1" >
        <a class="sprite-logo-small" href="#"  ></a>
      </div>
      <div class="col-md-5" >
        <p>Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. In
        bibendum massa non ligula
        pharetra dictum. Vestibulum
        ultrices, nulla ut molestie scelerisque</p>
        <a href="#">Contact Us</a>
      </div>
      <div class="col-md-3">
        <ul>
          <li><a href="#">Find</a></li>
          <li><a href="#">Join</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Success stories</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-3" >
          <a href="#" class="sprite-social-facebook social_inline" ></a>
          <a href="#" class="sprite-social-tumblr social_inline"></a>
          <a href="#" class="sprite-social-pinterest social_inline" ></a>
          <a href="#" class="sprite-social-twitter social_inline" ></a>
      </div>
    </div>
  </footer>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <?php echo '<script'; ?>
>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: <?php echo $_smarty_tpl->tpl_vars['lat']->value;?>
, lng: <?php echo $_smarty_tpl->tpl_vars['lng']->value;?>

        },
        zoom: 8
      });
    }
  <?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['google_api_root']->value;?>
" async defer><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$('.menu_slicknav').slicknav({
    label: '',
    duration: 1000,
    easingOpen: "easeOutBounce", //available with jQuery UI
    prependTo:'.slicky'
});
<?php echo '</script'; ?>
> 
</body>
</html>
<?php }} ?>
