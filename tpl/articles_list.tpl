					{foreach from=$allArticles item=article}

						<div class="row shadowed-border" >

							<div class="col-lg-12" >
								<article >
									<a href="?q={$article.slug}" ><h3>{$article.title}</h3></a>
									
									<h4 class="calendar_entry">{$article.article_date} {$article.article_time}</h4>
								
									<p>{$article.short_description}</p>
									
								</article>
							</div>
							
						</div>
					{foreachelse}

					<h3>No Articles, yet</h3>

					{/foreach}
	<div class="pagination-wrapper">
    {if $no_of_page>0}
        <div class="last_item" style="display: none;">{$no_of_page}</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_front_articles({$min_page});return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_front_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_front_articles('{$start}');return false;">{$start}</a>
                        </li>
                    {/if} 
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_front_articles();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_front_articles('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}
    </div>