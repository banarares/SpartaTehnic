{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Settings</h2>

            <div class="clear" style="height:15px;"> </div>
            <div class="filter_holder {if $searched}activ{/if}" {if $searched}style="display:block;"{/if}>
                <form id="filter_user_frm" action="{$admin_categories_url}" method="get">
                    <input type="hidden" name="action" value="admin-categories">
                    <input type="text" name="s_name" class="pb_input_title" placeholder="Name"  id="s_name" value="{$s_name}"/>

                    <input type="submit" name="Submit" value="Search" class="search" />
                    <input type="button" name="Reset" value="Reset" class="reset-btn" />

                </form>
            </div>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="setting_item('', 'add');">Add New Setting </a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="clear" ></div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Last Updated Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$allSettings item=setting name=setting}
                        <tr>
                            <td>{$setting.setting_id}</td>
                            <td>{$setting.setting_name}</td>
                            <td>{$setting.setting_value}</td>
                            <td>{$setting.last_update_date}</td>

                            <td width="100">
                                <a href="javascript:void(0);" setting_id="{$setting.setting_id}" data-open="modal" data-target="#editModal-{$setting.setting_id}" title="edit" class="edit_user" onclick="setting_item({$setting.setting_id}, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                <a href="javascript:void(0);" setting_id="{$setting.setting_id}" title="delete" class="delete_setting_item"  onclick="delete_setting_item({$setting.setting_id});"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>

                            </td>
                        </tr>
                         {foreachelse}
                        <tr>
                            <td colspan="6" class="text-center">No results</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>

            <div class="clear" ></div>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="settingModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="settingModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_setting('frm_setting');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


{*{include file="{$tpl_folder_root}/footer.tpl"}*}
