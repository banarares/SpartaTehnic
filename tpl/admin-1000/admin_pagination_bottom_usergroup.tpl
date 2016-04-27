

 {if $no_of_page>0}
        <div class="paginare  bottom">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_usergroups('1','{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_usergroups('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no}class="curent_item"{/if}>
                            <a  href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_usergroups('{$start}','{$type}');return false;">{$start}</a>
                        </li> 
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_usergroups('{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_usergroups('{$no_of_page}','{$type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}