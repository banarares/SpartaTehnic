<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-14 16:26:54
         compiled from "/var/www/akiva/tpl/products_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2000711752570f9a9e92add0-80104986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10eef545ce31286c42522ab69742882e2060a869' => 
    array (
      0 => '/var/www/akiva/tpl/products_1.tpl',
      1 => 1460640327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2000711752570f9a9e92add0-80104986',
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
  'unifunc' => 'content_570f9a9e93cbb0_42697232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570f9a9e93cbb0_42697232')) {function content_570f9a9e93cbb0_42697232($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=="home") {?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

  <!-- CONTENT -->
  <div class="master-wrapper-products">
    <div class="row first-row-product">
      <div class="col-lg-8 product_left" >
        <div class="image-bg">
          <img src="images/background.png" class="image-big-img" alt="preview Product" />
          <div class="bg-overlayer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
          pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque</div>
        </div>

      </div>

<!--Right side widget -->
<div class="col-lg-4 widged_right_1 " >

      <div class="info-product ">
        <h3 id="llc_info">LLC INFORMATION</h3>
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
    <h3 id="llc_info">Related Products</h3>
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
                  <h3 class="llc_info">LC REVIEWS</h3>
                  <div class="horizontal-mini-line"></div>
                </div>
                <div class="col-lg-4">
                <div class="sprite-stars-3"></div>
                <div class="review-author">
                  <p>Review by Nan</p>
                  <p>Posted on 7/7/2016</p>
                </div>
                </div>
                <div class="col-lg-8 descrpition">
                  <h4>Best thing ever ... saved my marriage</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque. Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit. In bibendum massa non ligula
                  pharetra dictum. Vestibulum ultrices, nulla ut molestie scelerisque</p>
                </div>
              </div>

              <div class="pagination-reviews">

                  <div class="row">

                    <div class="col-lg-6 text-left">
                      <p>1 item(s)</p>
                    </div>

                    <div class="col-lg-6 text-center">
                      <p>Show
                        <select>
                          <option>1</option>
                          <option>5</option>
                          <option selected>10</option>
                          <option>25</option>
                          <option>50</option>
                          <option>100</option>
                        </select>
                        per page
                      </p>
                    </div>

                  </div>
              </div>

    </div>
</div>


</div>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_folder']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
