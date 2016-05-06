{include file="{$tpl_folder}/header.tpl"}
<header>

</header>
{if $action eq "home" }
  {include file="{$tpl_folder}/banner.tpl"}
{else}
  {include file="{$tpl_folder}/search_form.tpl"}
{/if}

<div class="master-wrapper">
	<div class="row">
		<div class="col-lg-3">
			<div class="articles_menu" style="border-right:1px solid #ccc;">
				<ul><li><a href="?action=all-blogs" {if $action == 'all-blogs'}class="active_art"{/if}>All Articles</a></li></ul>
				{if $action == 'all-blogs'}
					
				{else}

				{/if}
					{include file="{$tpl_folder}/articles-menu.tpl"}
				
			</div>
		</div>
		<div class="col-lg-9" >
			
			{if $action == 'all-blogs'}

			<script>
			current_front_articles();
			</script>

			<h1>{$page_title}</h1>

			<div id="list_results">
	
		    </div>
		    
		    </div>
			{else}
				<h1 itemprop="name">{$articleInfo.title}</h1>

		        {$articleInfo.version_1}
	        {/if}
	        
		</div>



	</div>
</div>

<a href="#0" class="cd-top">Top</a>

{include file="{$tpl_folder}/footer.tpl"}
