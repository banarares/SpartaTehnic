{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">User Management</h2>

            <div class="clear" style="height:15px;"> </div>

            <div class="top_edit">

                <a href="javascript:void(0);" onclick="admin_item('','add', event);" >Add New User</a>
                
                

            </div>
            <div class="clear" style="height:5px;"> </div>

            {if $current_admins == 1}
                <script>
                    //get threads for some defaults links
                    current_admins();
                </script>
            {/if}
 
                
                {include file="{$tpl_folder}/admin_filter.tpl"} 
                
                <div class="clear">&nbsp;</div>
                    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="/img/loading.gif"></div>
                <div class="clear">&nbsp;</div>
                
                {include file="{$tpl_folder}/users_list.tpl"}
                


        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="userModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="userModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_admin('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

{* {include file="{$tpl_folder_root}/footer.tpl"} *}
