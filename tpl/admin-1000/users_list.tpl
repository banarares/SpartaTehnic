
   
<div id="list_results">
{include file="{$tpl_folder}/admin_pagination.tpl"}   


     <input type="hidden" name="sort" value="0" form="filter" /> 
                       

    <div class="clear">&nbsp;</div>
    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>

 
                   
    <div class="table-responsive">
        
        <table class="table table-hover">
       
            <thead>
            <tr>
                
                <th class="filter filter_user_id format_id">Id                
                    <div class="button-right-wrapper" >
                    <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=user_id&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_id}"></span></a>                
                </th>
                <th class="filter filter_user_name format_name">UserName 
                    <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=user_name&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_name}"></span></a>
                </th>
                <th class="filter filter_email format_name">Email 
                    <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=email&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_email}"></span></a>
                </th>
                <th class="filter filter_user_ip row format_creation_date">Created date 
                    <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=created_date&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_date}"></span></a>

                </th>
                <th class="filter filter_user_ip format_ip">IP
                    <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=ip_address&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_ip}"></span></a>
                </th>
                <th class="filter filter_usergroup format_name">Usergroup 
                <a href="{$link_pagination}&pageId=1&s_user_id={$s_user_id}&type={$s_type}&filter=usergroup_id&s_name={$s_name}&s_ip={$s_ip}&s_email={$s_email}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&s_usergroup={$s_date_usergroup}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1"><span class="{$arrow_usergroup}"></span></a>
                </th>



                <input type="hidden" name="action" value="admin-users" form="filter" />

                <th class="format_actions">Actions</th>
                
            </tr>
            </thead>
            <tbody>

   
            {foreach from=$allUsers item=user name=users}
                <tr>
                    <td>{$user.user_id}</td>
                    <td>{$user.user_name}</td>
                    <td>{$user.email}</td>
                    <td>{$user.created_date}</td>
                    <td>{$user.ip_address}</td>
                    <td>{$user.usergroup_name}</td>

                    <td>
                        <a href="javascript:void(0);" user_id="{$user.user_id}" data-open="modal" title="edit" class="edit_user" onclick="admin_item({$user.user_id}, 'edit', event);"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" user_id="{$user.user_id}" title="delete" class="delete_item"  onclick="delete_admin({$user.user_id});"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                    </td>



                </tr>
            {foreachelse}
                <tr>
                    <td colspan="7" class="text-center">No results</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{include file="{$tpl_folder}/admin_pagination_bottom.tpl"}
</div>




                                  


                       
         