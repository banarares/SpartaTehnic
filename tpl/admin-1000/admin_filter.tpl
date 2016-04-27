    <div class="filter-wrapper">
        <form action="{$link_pagination}#{$link_ajax}pagina=1" method="get"  name="filter" id="filter"></form>
        <div class="row">

            <div class="col-lg-1"><br />
                <input form="filter" type="number" autocomplete="off" min="0" placeholder="id" class="search_user_id" name="s_user_id" value="{if $s_user_id != 'undefined'}{$s_user_id}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter" type="text" autocomplete="off" name="s_name" placeholder="user name" class="search_user_name" value="{if $s_name != 'undefined'}{$s_name}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                <input form="filter" type="text" autocomplete="off" name="s_email" placeholder="email" class="search_user_email" value="{if $s_email != 'undefined'}{$s_email}{/if}" />
            </div>
            <div class="col-lg-2"><br />
                
                    <input type="text" form="filter" autocomplete="off" name="s_date_start"  placeholder="start date"  id="datepicker_start" class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" />
                
                    <input type="text" form="filter" autocomplete="off" name="s_date_end"  placeholder="end date"  id="datepicker_end" class="search_user_email text-center" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" />
               
            </div>
            <div class="col-lg-2"><br />
                    <input form="filter" type="text" autocomplete="off" name="s_ip" placeholder="ip" class="search_user_email" value="{if $s_ip != 'undefined'}{$s_ip}{/if}" />
                  
                    <input form="filter" type="hidden" autocomplete="off" name="action" value="admin-users" />
                    
            </div>
            <div class="col-lg-2"><br />
                        <select name="s_usergroup" class="form-control" form="filter" id="usergroup_selection">
                             <option  value="undefined" {if $s_usergroup == $key }style="display:block;" selected{else}style="display:hidden;"{/if} >Select Usergroup</option> 
                            
                                {foreach from=$usergroups item="usergroup" key="key"} 
                            <option value="{$usergroup.usergroup_id}"  {if $s_usergroup == $usergroup.usergroup_id}selected="selected"{/if} >{$usergroup.usergroup_name}</h3></option>
                                {/foreach}
                               
                        </select>

            </div>
            <div class="col-lg-1" ><br />
                <input form="filter" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{$admin_users_url}';"  >Reset</button>
            </div>        
        </div>        
    </div>


