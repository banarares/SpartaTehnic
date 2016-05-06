{include file="{$tpl_folder}/header.tpl"}

{if $action eq "home" }
  {include file="{$tpl_folder}/banner.tpl"}
{else}
  {include file="{$tpl_folder}/search_form.tpl"}
{/if}
<div class="master-wrapper">
<h1>404 - Error</h1>
<h3>The page you are looking for doesn't exist</h3>
</div>


{include file="{$tpl_folder}/footer.tpl"}
