
<div id="list_results">

                {if $no_of_page>0}
                    <div class="last_item" style="display: none;">{$no_of_page}</div>
                    <div class="paginare">
                        <ul class="list_pagination">
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_categories({$min_page},'{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                            </li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_categories('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                            {for $start=1 to $no_of_page}
                                {if $start >= $min_page && $start <= $max_page}
                                    <li {if $start == $page_no} class="curent_item"{/if}>
                                        <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_categories('{$start}','{$type}');return false;">{$start}</a>
                                    </li>
                                {/if}
                            {/for}
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_categories('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_categories('{$no_of_page}','{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                    </div>
                {/if}
            <div class="clear" ></div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="100">&nbsp; &nbsp;Id
                            <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_name={$s_name}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=category_id#{$link_ajax}pagina=1"><span class="{$arrow_id}"></span></a>
                            </div>   
                        </th>
                        <th >Name
                            <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_name={$s_name}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=name#{$link_ajax}pagina=1"><span class="{$arrow_name}"></span></a>
                            </div>  
                        </th>
                        <th  width="90">Status
                            <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_name={$s_name}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=status#{$link_ajax}pagina=1"><span class="{$arrow_status}"></span></a>
                            </div>  
                        </th>
                        <th width="210">Created Date
                            <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_name={$s_name}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=creation_date#{$link_ajax}pagina=1"><span class="{$arrow_date}"></span></a>
                            </div> 
                        </th>
                        <th width="100">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$allCategories item=category name=category}
                        <tr>
                            <td ><div style="width:25px;text-align:right;display:inline-block;margin:0;padding:0;">{$category.category_id}</div>&nbsp;
                            {if ($s_name eq 'undefined' || $s_name eq '') &&   
                                ($status eq 'undefined' || $status eq '') && 
                                ($s_date_start eq '' || $s_date_start eq 'undefined') &&
                                ($s_date_end eq '' || $s_date_end eq 'undefined') &&
                                ($filter eq 'undefined' || $filter eq '')
                            } 


                                {if $category.category_id == $allCategorieslist.$total_categories }{else}<a href="javascript:void(0);" category_id="{$category.category_id}" title="Move DOWN" class="move_menu_item" onclick="move_category_item({$category.category_id}, 'after', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-down" title="Move DOWN"></span></a> &nbsp;{/if} 
                                {if $category.category_id == $allCategorieslist.0 }{else}<a href="javascript:void(0);" category_id="{$category.category_id}" title="Move UP" class="move_menu_item" onclick="move_category_item({$category.category_id}, 'before', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-up" title="Move UP"></span></a> &nbsp;{/if}

                                

                            {else}                            
                            

                            {/if}
                            </td>
                            <td >{$category.name}</td>
                            <!--<td>{$category.display_order}</td>-->
                            <td >{if $category.status == 1}Active{else}Inactive{/if}</td>
                            <td>{$category.creation_date}</td>

                            <td>
                                <a href="javascript:void(0);" category_id="{$category.category_id}" data-open="modal" data-target="#editModal-{$category.category_id}" title="edit" class="edit_user" onclick="category_item({$category.category_id}, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                <a href="javascript:void(0);" category_id="{$category.category_id}" title="delete" class="delete_category_item"  onclick="delete_category_item({$category.category_id}, 'to_categorys');"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                            </td>
                        </tr>
                         {foreachelse}
                        <tr>
                            <td colspan="6" class="text-center">No results</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>

            <div class="clear" ></div>
             {if $no_of_page>0}
                <div class="paginare  bottom">
                    <ul class="list_pagination">
                        <li>
                            <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_categories('1','{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_categories('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                        {for $start=1 to $no_of_page}
                            {if $start >= $min_page && $start <= $max_page}
                                <li {if $start == $page_no} class="curent_item"{/if}>
                                    <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_categories('{$start}','{$type}');return false;">{$start}</a>
                                </li>
                            {/if}
                        {/for}
                        <li>
                            <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_categories('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_categories('{$no_of_page}','{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            {/if}
 </div>