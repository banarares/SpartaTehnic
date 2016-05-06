{include file="{$tpl_folder}/header.tpl"}

{if $action eq "home" }
  {include file="{$tpl_folder}/banner.tpl"}
{else}
  {include file="{$tpl_folder}/search_form.tpl"}
{/if}

{if $action eq "home" }
<!-- CONTENT -->
<div class="master-wrapper" >
  <div class="row first-row">

      <div class="col-xs-6"  >
        <div class="sprite-bg-cell-1 cell_1_2 text-center join_us white_color" >
              <h4>{$search_style} "THE GOLD STANDARD IN BORROWING AND LENDING"</h4>
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
{/if}
<div class="clear-break"></div>

{include file="{$tpl_folder}/footer.tpl"}
