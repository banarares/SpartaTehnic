<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 12:09:15
         compiled from "/var/www/akiva/tpl/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489623853572c5f3b9163b0-38903160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38af48001e7b85d0b75a79b00ba781e62b398cfa' => 
    array (
      0 => '/var/www/akiva/tpl/about.tpl',
      1 => 1460707503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489623853572c5f3b9163b0-38903160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_folder' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c5f3b92b278_00474257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c5f3b92b278_00474257')) {function content_572c5f3b92b278_00474257($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="home") {?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

  <!-- CONTENT -->
  <div class="master-wrapper-products">
    <div class="row first-row-product">
      <div class="col-lg-8 product_left" >

        <div >
          <ul class="bxslider">
            <li >
              <img src="images/background.png" class="about_slider" alt="preview Product" />
              <div class="bg-overlayer">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                In bibendum massa non ligula pharetra dictum. <br />
                Vestibulum ultrices, nulla ut molestie scelerisque</div>
            </li>
            <li>
              <img src="images/background.png" class="about_slider" alt="preview Product" />
              <div class="bg-overlayer">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                In bibendum massa non ligula pharetra dictum. <br />
                Vestibulum ultrices, nulla ut molestie scelerisque</div>
            </li>
            <li>
              <img src="images/background.png" class="about_slider" alt="preview Product" />
              <div class="bg-overlayer">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                In bibendum massa non ligula pharetra dictum. <br />
                Vestibulum ultrices, nulla ut molestie scelerisque</div>
            </li>
          </ul>

        </div>
      </div>

<!--Right side widget -->
<div class="col-lg-4 widged_right_1 " >

      <div class="info-product ">
        <h3 class="llc_info">LLC INFORMATION</h3>
        <div class="horizontal-mini-line"></div>
          <p class="gray">This product is provided by: <BR />
          Funland LLC<BR />
          7 Sesame Street, Funland <BR />
          Sydney </p>

          <p  class="gray">Ph: 8897 5439 19200 </p>

          <p  class="gray">Hours of Operation: </p>
          <table class="table gray">
            <thead>
              <tr>

                  <td>Mon - Fri</td>
                  <td><strong>9:00 am – 6:00 pm</strong></td>

              </tr>
            </thead>
            <tbody>
              <tr>

                  <td>Sat</td>
                  <td><strong>9:00 am – 6:00 pm</strong></td>

              </tr>
              <tr>
                  <td>Sun   </td>
                  <td><strong>9:00 am – 6:00 pm</strong></td>
              </tr>
            </tbody>
          </table>
                </div>
                <!--<div id="map"><img src="images/map.png" /></div>-->
                <div id="map" style=""></div>
              </div>
              <!-- GOogle map -->

            </div>
<!--End right side widget -->

<div class="related_products">

  <div class="row master-wrapper-products related_wrapper">
    <h3 class="llc_info ">Related Products</h3>
    <div class="horizontal-mini-line-black" ></div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-1.png" alt="recomended" />
        <div class="text-info">
        <p>Product Name</p>
        <p>900 Points</p>
        <p>LC Name</p>
        <div class="sprite-stars-5"></div>
        </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-2.png" alt="recomended" />
          <div class="text-info">
            <p>Product Name</p>
            <p>900 Points</p>
            <p>LC Name</p>
            <div class="sprite-stars-4"></div>
          </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-3.png" alt="recomended" />
          <div class="text-info">
            <p>Product Name</p>
            <p>900 Points</p>
            <p>LC Name</p>
            <div class="sprite-stars-3"></div>
          </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-4.png" alt="recomended" />
        <div class="text-info">
          <p>Product Name</p>
          <p>900 Points</p>
          <p>LC Name</p>
          <div class="sprite-stars-2"></div>
        </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-5.png" alt="recomended" />
          <div class="text-info">
          <p>Product Name</p>
          <p>900 Points</p>
          <p>LC Name</p>
          <div class="sprite-stars-1"></div>
        </div>
      </div>



      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-1.png" alt="recomended" />
        <div class="text-info">
          <p>Product Name</p>
          <p>900 Points</p>
          <p>LC Name</p>
          <div class="sprite-stars-5"></div>
        </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-2.png" alt="recomended" />
          <div class="text-info">
            <p>Product Name</p>
            <p>900 Points</p>
            <p>LC Name</p>
            <div class="sprite-stars-4"></div>
          </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-3.png" alt="recomended" />
          <div class="text-info">
            <p>Product Name</p>
            <p>900 Points</p>
            <p>LC Name</p>
            <div class="sprite-stars-3"></div>
          </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-4.png" alt="recomended" />
        <div class="text-info">
          <p>Product Name</p>
          <p>900 Points</p>
          <p>LC Name</p>
          <div class="sprite-stars-2"></div>
        </div>
      </div>
      <div class="col-lg-2 product_info">
        <img src="/assets/recomended-5.png" alt="recomended" />
          <div class="text-info">
          <p>Product Name</p>
          <p>900 Points</p>
          <p>LC Name</p>
          <div class="sprite-stars-1"></div>
        </div>
      </div>

  </div>
<!--Related Products -->

    <!-- REVIEWS -->
<div class="reviews bg-blue">
  <div class="master-wrapper ">

              <div class="review_id_1 review row first-row">
                <div class="col-lg-12 ">
                  <h3 class="llc_info blue-color">LC REVIEWS</h3>
                  <div class="horizontal-mini-line black-color" ></div>
                </div>
                <div class="col-lg-6 padding_auto_20">
                  <div class="row">
                  <div class="col-lg-4">
                    <div class="sprite-stars-3"></div>
                    <div class="review-author">
                      <p>Review by Nan</p>
                      <p>Posted on 7/7/2016</p>
                    </div>
                  </div>
                <div class="col-lg-6 descrpition">
                  <h4>Best thing ever ... saved my marriage</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque. Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque</p>
                </div>
              </div>
            </div>
                <div class="col-lg-6 padding_auto_20">
                  <div class="row">
                  <div class="col-lg-4">
                    <div class="sprite-stars-3"></div>
                    <div class="review-author">
                      <p>Review by Nan</p>
                      <p>Posted on 7/7/2016</p>
                    </div>
                  </div>
                <div class="col-lg-6 descrpition">
                  <h4>Best thing ever ... saved my marriage</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque. Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque</p>
                </div>
              </div>
            </div>


    </div>



</div>
</div>
</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
