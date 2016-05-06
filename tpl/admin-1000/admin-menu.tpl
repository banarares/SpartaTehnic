<div class="clear"> </div>

	<div class="content-menu content" >
        
            <ul class="meniu-footer menu_slicknav" id="admin_top_menu">
                <li {if $action=='admin-actions' }class="active"{/if}><a href="{$admin_actions_url}" >Actions </a></li>
                <li><a href="#" >Blog </a>
                    <ul> 
                    <li {if $action=='admin-articles'}class="active" {/if}><a href="{$admin_articles_url}">Blog Articles</a></li>
                    <li {if $action=='admin-categories'}class="active" {/if}><a href="{$admin_categories_url}">Blog Categories</a></li>
                    </ul>
                </li>
                <li {if $action=='admin-errors'}class="active"{/if}><a href="{$admin_errors_url}" >Errors Log </a></li>
                <li><a href="#" >Users</a>
                            
                            <ul> 
                                {if $is_admin}
                                <li {if $action=='admin-users'}class="active" {/if}><a href="{$admin_users_url}">User Management</a></li>
                                
                                <li {if $action=='admin-usergroup'}class="active" {/if}><a href="{$admin_usergroup_url}" >User groups</a></li>
                                <li {if $action=='admin-usergroup-actions'}class="active" {/if}><a href="{$admin_usergroup_actions_url}" >User group Actions</a></li>
                                {/if}
                            </ul>             
         
                </li>      
                    
                
                <li {if $action =='admin-assets'}class="active"{/if}><a href="{$admin_assets_url}" >Assets</a></li>

                <li {if $action =='admin-emails_management'}class="active"{/if}><a href="{$admin_emails_management_url}" >Emails</a></li>

                <li {if $action =='admin-settings'}class="active"{/if}><a href="{$admin_settings_url}" >Settings</a></li>


            </ul>
       
	</div>
    <div class="slicky"></div>
</div>
<div class="clear"> </div>

