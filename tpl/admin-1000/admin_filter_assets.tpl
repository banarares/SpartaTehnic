    <form action="{$link_pagination}#pagina=1" method="get" name="filter_assets" id="filter_assets"></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1"><br />
                <input form="filter_assets" type="number" min="0" placeholder="id" class="search_user_id" name="s_asset_id" value="{if $s_asset_id != 'undefined'}{$s_asset_id}{/if}" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_assets" type="text" name="s_name" placeholder="public name" class="search_user_name" value="{if $s_name != 'undefined'}{$s_name}{/if}" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_assets" type="text" name="s_description" placeholder="description" class="search_user_email" value="{if $s_description != 'undefined'}{$s_description}{/if}"  />
            </div>
            <div class="col-lg-2" ><br />
                            <select class="form-control" name="s_file_type" id="file_type" style="border-radius:2px;">
                                <option value="">- file type - </option>
                                <option value="image" {if $s_file_type=='image'}selected="selected"{/if} >image</option>
                                <option value="document" {if $s_file_type=='document'}selected="selected"{/if}>document</option>
                                <option value="sound" {if $s_file_type=='sound'}selected="selected"{/if}>sound</option>
                            </select>                
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_assets" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" >
                
                    <input form="filter_assets" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_assets" type="hidden" name="action"  value="admin-assets"  />

                <input form="filter_assets" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{$admin_assets_url}';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_assets" />



 
       
 