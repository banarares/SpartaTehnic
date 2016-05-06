
<form action="{$link_pagination}#pagina=1" method="get" name="filter_articles" id="filter_articles"></form>
    <div class="filter-wrapper">
        <div class="row"> 

            <div class="col-lg-1"><br />
                <input form="filter_articles" type="number" min="0" placeholder="id" class="search_user_id" name="s_id" value="{if $s_id != 'undefined'}{$s_id}{/if}" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_articles" type="text" name="s_title" placeholder="title" class="search_user_name" value="{if $s_title != 'undefined'}{$s_title}{/if}" />
            </div>
            <div class="col-lg-3"><br />
                <input form="filter_articles" type="text" name="s_short_title" placeholder="short title" class="search_user_email" value="{if $s_short_title != 'undefined'}{$s_short_title}{/if}"  />
            </div>
            <div class="col-lg-2" ><br />
    <div class="form-group">
        
        <select name="s_category_id"  form="filter_articles">
            <option value=""> - category - </option>
            {foreach from=$categories_list item=category name=category}
                <option value="{$category.category_id}"  {if $category.category_id == $s_category_id}selected{/if}>{$category.name}</option>
            {/foreach}
        </select>
        
        <select name="s_status" form="filter_articles">
            <option value="" > - status - </option>
            <option value="0" {if $s_status == '0'}selected{/if}> Inactive </option>
            <option value="1" {if $s_status == '1'}selected{/if}> Active </option>
        </select>
    </div>             
            </div>
            <div class="col-lg-2"><br />  
                    
                    <input form="filter_articles" id="datepicker_start" name="s_date_start"  placeholder="start date" type="text"  class="search_user_email text-center" value="{if $s_date_start != 'undefined'}{$s_date_start}{/if}" >
                
                    <input form="filter_articles" id="datepicker_end"  name="s_date_end"  placeholder="end date" type="text"  class="search_user_email text" value="{if $s_date_end != 'undefined'}{$s_date_end}{/if}" >
                
            </div>
            <div class="col-lg-1"><br />
                <input form="filter_articles" type="hidden" name="action"  value="admin-articles"  />
                
                <input form="filter_articles" type="hidden" name="filter" value="article_id" />

                <input form="filter_articles" type="submit" class="search_button" value="Search" />
                <button class="reset_button" onClick="window.location.href = '{$admin_articles_url}';">Reset</button>

            </div>
        
        </div>   
        <div id="error_delete"></div>     
    </div>
