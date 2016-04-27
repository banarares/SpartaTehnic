<body>
  <header class="master-header-admin" >

      <a href="{$root_url}">
      {if $site_logo}
       <span style="width:60px;">{$site_logo}</span>
       {else}
       <h1 style="display:inline-block">{$site_name}</h1>
      {/if}
      </a>

      <a href="{$root_url_admin}">
        Admin
      </a>


    {if $is_admin}
    <span class="ic-search"></span>
    <div id="meniu-top" >
        <ul class="meniu">
            <li>
                {$SESSION.user_name}, <a href="mailto:{$SESSION.email}">{$SESSION.email}</a><small></small>
            </li>
            <li style="float: right;"><a href="{$admin_users_logout_url}" >Logout</a></li>
        </ul>
    </div>
    {/if}



  </header>

<div>
    {if $is_admin}
    {include file="{$tpl_folder}/admin-menu.tpl"}
    {/if}
</div>
