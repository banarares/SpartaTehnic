<!-- SUBSCRIBE SECTION -->
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

  <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: {$lat}, lng: {$lng}
        },
        zoom: 8
      });
    }
  </script>
  <script src="{$google_api_root}" async defer></script>
<script>
$('.menu_slicknav').slicknav({
    label: '',
    duration: 1000,
    easingOpen: "easeOutBounce", //available with jQuery UI
    prependTo:'.slicky'
});
</script> 
</body>
</html>
