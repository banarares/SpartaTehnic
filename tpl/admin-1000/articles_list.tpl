<div id="list_results">


    {if $no_of_page>0}
        <div class="last_item" style="display: none;">{$no_of_page}</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_articles({$min_page});return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_articles('{$start}');return false;">{$start}</a>
                        </li>
                    {/if} 
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_articles('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}
    <div class="clear">&nbsp;</div>
    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="{$IMAGES_PATH_DIR}/loading.gif"></div>
    <div class="clear">&nbsp;</div>



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="100">&nbsp;&nbsp;Id
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=article_id#{$link_ajax}pagina=1">
                                <span class="{$arrow_id}"></span>
                            </a>
                    </div>   
                </th>
                <th>Title
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=title#{$link_ajax}pagina=1">
                                <span class="{$arrow_title}"></span>
                            </a>
                    </div> 
                </th>
                <th width="140">Short Title
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=short_title#{$link_ajax}pagina=1">
                                <span class="{$arrow_short_title}"></span>
                            </a>
                    </div> 
                </th> 
                <th width="120">Category
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=category_name#{$link_ajax}pagina=1">
                                <span class="{$arrow_category}"></span>
                            </a>
                    </div> 
                </th>
                <!--<th>Version 1</th>-->
                <th width="130">Created Date
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=creation_date#{$link_ajax}pagina=1">
                                <span class="{$arrow_create_date}"></span>
                            </a>
                    </div> </th>
                <th width="130">Last Updated Date
                    <div class="button-right-wrapper" >
                            <a href="{$link_pagination}&pageId=1&s_id={$s_id}&s_title={$s_title}&s_short_title={$s_short_title}&s_category_id={$s_category_id}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}&status={$status}&filter=last_update_date#{$link_ajax}pagina=1">
                                <span class="{$arrow_update_date}"></span>
                            </a>
                    </div>
                </th>
                <th width="120">Actions</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$allArticles item=article name=articles}
                <tr onclick="toggle_content({$article.article_id});">
                    <td><div style="width:25px;text-align:right;display:inline-block;">{$article.article_id}</div>
                        {if ($s_title eq 'undefined' || $s_title eq '') &&   
                        ($s_category_id eq '' || $s_category_id eq 'undefined' ) && 
                        ($s_short_title eq '' || $s_short_title eq 'undefined') &&
                        ($s_date_start eq '' || $s_date_start eq 'undefined') &&
                        ($s_date_end eq '' || $s_date_end eq 'undefined')  &&
                        ($filter eq 'undefined') } 

                            {if $article.article_id == $allArticleslist.$total_articles }{else}<a href="javascript:void(0);" article_id="{$article.article_id}" title="Move DOWN" class="move_menu_item" onclick="move_article_item({$article.article_id}, 'after', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-down" title="Move DOWN"></span></a> &nbsp;{/if}

                            {if $article.article_id == $allArticleslist.0 }{else}<a href="javascript:void(0);" article_id="{$article.article_id}" title="Move UP" class="move_menu_item" onclick="move_article_item({$article.article_id}, 'before', event);"><span aria-hidden="true" class="glyphicon glyphicon-chevron-up" title="Move UP"></span></a> &nbsp;{/if}

                        {/if}
                    </td>
                    <td>
                        <span style="margin-right: 10px; width: 10px; vertical-align: top; {if $article.status == 1} display:none; {else} display:inline-blockl{/if}" id="icon-status-{$article.article_id}" class="glyphicon {if $article.status == 1} {else} glyphicon-alert text-error{/if}"></span>
                        <div style="display: inline-block; max-width:180px;" id="article-title-{$article.article_id}">
                        <a href="{$root_url}/?q={$article.slug}" class="view_live_link" title="View Live" target="_blank">{$article.title}</a>
                        </div>
                    </td>
                    <td>{$article.short_title}</td>
                    <td>{$article.category_name}</td>
                   <!-- <td>{$article.version_1}</td>-->
                    <td>{$article.creation_date}</td>
                    <td>{$article.version_1_date}</td>

                    <td>
                        <a href="javascript:void(0);" current-status="{$article.status}" id="update-status-{$article.article_id}" title="{if $article.status == 1}Inactive{else}Active{/if}" {if $article.status == 1}class="text-success"{else}class="text-error"{/if} onclick="update_article_status({$article.article_id}, event);"><span aria-hidden="true" class="glyphicon {if $article.status == 1} glyphicon-ok{else} glyphicon-ok{/if}"></span></a> &nbsp;
                        <a href="javascript:void(0);" article_id="{$article.article_id}" data-open="modal" data-target="#editModal-{$article.article_id}" title="edit" class="edit_user" onclick="article_item({$article.article_id}, 'edit', event);"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" article_id="{$article.article_id}" data-open="modal" data-target="#editModal-{$article.article_id}" title="all versions" class="edit_user" onclick="show_article_item({$article.article_id},event);"><span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span></a> &nbsp;

                        <a href="javascript:void(0);" article_id="{$article.article_id}" title="delete" class="delete_article_item"  onclick="delete_article_item({$article.article_id}, event);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                    </td>
                </tr>
                <tr id="{$article.article_id}_content" style="display: none;"><td colspan="7">{$article.version_1}</td></tr>
            {foreachelse}
                <tr>
                    <td colspan="6" class="text-center">No results</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

    {if $no_of_page>0}
        <div class="paginare  bottom">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_articles('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_articles('{$start}');return false;">{$start}</a>
                        </li>
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_articles('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}

</div>

