    <form action="{$link_pagination}#pagina=1" method="get" name="filter_assets" id="filter_assets_browse" ></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1" style="display:inline-block; width:80px; vertical-align:top;">
                <input form="filter_assets_browse" type="number" min="0" placeholder="id" class="search_user_id" name="s_asset_id" value="{if $s_asset_id != 'undefined'}{$s_asset_id}{/if}" />
            </div>
            <div class="col-lg-3" style="display:inline-block; width:160px; vertical-align:top;">
                <input form="filter_assets_browse" type="text" name="s_name" placeholder="public name" class="search_user_name" value="{if $s_name != 'undefined'}{$s_name}{/if}" />
            </div>
            <div class="col-lg-3" style="display:inline-block; width:160px; vertical-align:top;">
                <input form="filter_assets_browse" type="text" name="s_description" placeholder="description" class="search_user_email" value="{if $s_description != 'undefined'}{$s_description}{/if}"  />
            </div>

            <div class="col-lg-2" style="display:inline-block; width:160px; vertical-align:top;">
                    
                    <input form="filter_assets_browse" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" >
                
                    <input form="filter_assets_browse" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" >
               
            </div>
            <div class="col-lg-1" style="display:inline-block; width:120px; vertical-align:top;">
                <input form="filter_assets_browse" type="hidden" name="action"  value="admin-assets"  />

                <input form="filter_assets_browse" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{if $source == 'ckeditor'}{$browse_assets_list_ckeditor_url}{else}{$browse_assets_list_url}{/if}';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_assets_browse" />

    

 
       
 