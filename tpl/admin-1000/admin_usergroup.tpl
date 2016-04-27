{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}
            {if $current_admin == 1}

            {/if}
                <script>
                    //get threads for some defaults links
                    current_pagination_user_groups();
                </script>
<div class="wraper">
    <div class="content-wrap page">



        <div class="content">
            <h2 class="tell_pb left">Management of user groups</h2>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);" onclick="usergroup_item('','add', event);"  >Add New User group</a></div>

            <div class="clear" style="height:15px;"></div>



                {include file="{$tpl_folder}/admin_filter_usergroup.tpl"}
 
                {include file="{$tpl_folder}/usergroup_list.tpl"} 
                
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="usergroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="usergroupModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="usergroupModalBody"> 

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_usergroup('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

{* {include file="{$tpl_folder_root}/footer.tpl"} *}