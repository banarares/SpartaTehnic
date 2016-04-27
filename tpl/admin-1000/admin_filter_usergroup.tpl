    <form action="{$link_pagination}#pagina=1" method="get" name="filter_usergroup" id="filter_usergroup"></form>
    <div class="filter-wrapper">
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter_usergroup" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="{if $s_id != 'undefined'}{$s_id}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_usergroup" type="text" name="s_name" placeholder="user group" class="search_user_name" value="{if $s_name != 'undefined'}{$s_name}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter_usergroup" type="text" name="s_description" placeholder="description" class="search_user_email" value="{if $s_description != 'undefined'}{$s_description}{/if}" />
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_usergroup" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" >
                
                    <input form="filter_usergroup" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" >
               
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_usergroup" type="hidden" name="action"  value="admin-usergroup"  />

                <input form="filter_usergroup" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{$admin_usergroup_url}';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>

    <input type="hidden" name="sort" value="0" form="filter_usergroup" />
