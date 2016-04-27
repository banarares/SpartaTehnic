
<div id="list_results_usergroups">
   {include file="{$tpl_folder}/admin_pagination_usergroup.tpl"}                  

 

     <div class="clear">&nbsp;</div>
    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>         
                

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                     <tr>
 
                                        <th class="format_id">Id <div class="button-right-wrapper">
                                        <a href="{$link_pagination}&pageId=1{if $s_id!==0}&s_id={$s_id}{/if}&type={$s_type}&filter=usergroup_id&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                        <span class="{$arrow_id}"></span>
                                        </a>
                                        </div>
                                        </th>

                                        <th class="format_name">Usergroup <div class="button-right-wrapper">
                                        <a href="{$link_pagination}&pageId=1{if $s_id!==0}&s_id={$s_id}{/if}&type={$s_type}&filter=usergroup_name&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                        <span class="{$arrow_name}"></span>
                                        </a>
                                        </div>

                                        </th>
                                        <th class="format_description">Description <div class="button-right-wrapper">
                                        <a href="{$link_pagination}&pageId=1{if $s_id!==0}&s_id={$s_id}{/if}&type={$s_type}&filter=usergroup_description&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                        <span class="{$arrow_description}"></span>
                                        </a>
                                        </div>
                                        </th> 
                                        
                                        <th class="format_creation_date">Creation Date <div class="button-right-wrapper">
                                        <a href="{$link_pagination}&pageId=1{if $s_id!==0}&s_id={$s_id}{/if}&type={$s_type}&filter=create_date&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                        <span class="{$arrow_date}"></span>                                        
                                        </a>
                                        </div>
                                        </th>
                                        <th class="format_actions">Actions</th>

                                        </th>
                
                                            

                                    </tr>
                                </thead>

                                <tbody>
                                    {foreach from=$usergroup_obj item=usergroup  }
                                        <tr>
                                            <td>{$usergroup.usergroup_id}</td>
                                            <td>{$usergroup.usergroup_name}</td>
                                            <td>{$usergroup.usergroup_description}  </td>
                                            <td>{$usergroup.creation_date}</td>
                                            <td >
                                                <a href="javascript:void(0);" usergroup_id="{$usergroup.usergroup_id}" data-open="modal" data-target="#editModal-{$usergroup.usergroup_id}" title="edit" class="edit_user" onclick="usergroup_item({$usergroup.usergroup_id}, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                                <a href="javascript:void(0);" usergroup_id="{$usergroup.usergroup_id}" title="delete" class="delete_usergroup_item"  onclick="delete_usergroup_item({$usergroup.usergroup_id});"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                               
                                           

                                                                                       
                                            </td>
                                        </tr>
                                            
                                            
                                       
                                    {foreachelse}
                                        <tr>
                                            <td colspan="5" class="text-center">No results</td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
  
  
             

{include file="{$tpl_folder}/admin_pagination_bottom_usergroup.tpl"}
</div>

<script> 

</script>

                
                



                

                

             