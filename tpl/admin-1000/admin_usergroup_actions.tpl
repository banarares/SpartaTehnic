{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}


<div class="wraper">
    <div class="content-wrap page">


        <div class="content">
            <h2 class="tell_pb left">Usergroup Actions</h2>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);" onclick="usergroup_action_item('','add', event);"  >Add New Usergroup Action</a></div>

            <div class="clear" style="height:15px;"> </div>

            {if $current_admins == 1}
                <script>
                    //get threads for some defaults links
                    current_admins();
                </script>
            {/if}

                {include file="{$tpl_folder}/usergroup_actions_list.tpl"}

        </div>


                <script>
                    //get threads for some defaults links
                    current_admins();
                </script>

            


    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="usergroupactionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="usergroupactionsModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="usergroupactionsModalBody"> 

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_admin('frm_admin');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

{* {include file="{$tpl_folder_root}/footer.tpl"} *}