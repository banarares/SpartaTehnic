    <form action="{$link_pagination}#pagina=1" method="get" name="filter_categories" id="filter_categories"></form>
    <div class="filter-wrapper">
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter_categories" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="{if $s_id != 'undefined'}{$s_id}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_categories" type="text" name="s_name" placeholder="category name" class="search_user_name" value="{if $s_name != 'undefined'}{$s_name}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <select class="form-control" form="filter_categories" name="status" id="status" >
                    <option value="" {if $status !== '1' || $status !== '0' } selected {/if} >Select status</option>
                    <option value="1" {if $status == '1'} selected {/if} >Active</option>
                    <option value="0" {if $status == '0'} selected {/if} >Inactive</option>
                </select>                
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_categories" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" >
                
                    <input form="filter_categories" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_categories" type="hidden" name="action"  value="admin-categories"  />

                <input form="filter_categories" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{$admin_categories_url}';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_categories" />
