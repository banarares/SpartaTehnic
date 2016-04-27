{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Actions <small class="info">view only</small></h2>


            {if $is_admin}
                <script>
                    //get threads for some defaults links
                    current_admins();
                </script>
            
               <div class="row">
                   
                   <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Action id</th>
                                    <th>Action name</th>
                                    <th>Default value</th>
                                </tr>
                                </thead>
                                <tbody>
                                {foreach from=$actions_array item=actions  }
                                    <tr>
                                        <td>{$actions.action_id}</td>
                                        <td>{$actions.action_name}</td>
                                        <td>{$actions.action_default_value}</td>
                                    </tr>
                                    {foreachelse}
                                    <tr>
                                        <td colspan="5" class="text-center">No results</td>
                                    </tr>
                                {/foreach}
                                </tbody>
                            </table>
                        </div>

                </div>

               </div>

                
                
               
            {/if}

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