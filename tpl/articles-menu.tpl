    <ul>
        <li  {if $action == 'blog'}class="active_art" {/if}><a href="{$root_url}?action=blog">Blog</a></li>

        {foreach from=$articles_menu item=left_menus name=left_menus}
            {if $left_menus.category_title != 'Home' && $left_menus.category_title != 'Home'}
                <li class="pure-menu-heading">{$left_menus.category_title}</li>
            {/if}
            {if !empty($left_menus.articles)}
                {foreach from=$left_menus.articles item=left_articles name=left_articles}
                    {if $left_articles.title != ''}
                        <li {if $left_articles.slug == $article_slug}class="active_art" {/if}><a href="?q={$left_articles.slug}" onclick="go_to_url_onclick(this)" >{$left_articles.title}</a></li>
                    {/if}
                {/foreach}
            {/if}
        {/foreach}

    </ul>