{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="add_emai_managementl();" >Add New Email </a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="clear" ></div>


            {if $current_emails == 1}
                <script>
                    //get threads for some defaults links
                    current_emails();
                </script>
            {/if}

                {include file="{$tpl_folder}/emails_management_list.tpl"}


            <div class="clear" style="height:65px;"> </div>
            <div style=" font-size: 14px; font-style: italic;">
                These email addresses will be notified when any of the following events are happening:<br/>
                1. a new comment was added and need to be moderated;<br/><br/>
                <span style="margin-right: 5px;" class="glyphicon glyphicon-alert text-error"></span> Emails marked in this manner are currently suspended and will not receive any notifications.
            </div>

        </div>

    </div>

</div>


<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="emailModalLabel">Add Email Management</h4>
            </div>
            <div class="modal-body" id="emailModalBody">
                {include file="{$tpl_folder}/email-form.tpl"}
            </div>
            <div class="modal-footer">
                <button onclick="save_email_management();" class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>



