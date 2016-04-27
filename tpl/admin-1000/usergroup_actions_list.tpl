
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
                                        <th><small>Usergroup action id</small></th>
                                        <th><small>Usergroup</small></th>
                                        <th><small>Action ID</small></th>
                                        <th><small>Action Description</small></th>
                                        <th><small>Error Description</small></th>
                                        <th><small>Actions</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$actions item=individual_action  }
                                        <tr>
                                            <td class="text-center">{$individual_action.usergroup_action_id}</td>
                                            <td class="text-center">
                                                {foreach $usergroup_obj item=item }
                                                    {if $item.usergroup_id == $individual_action.usergroup_id }{$item.usergroup_name}{/if}
                                                {/foreach}
                                            </td>
                                            <td class="text-center">{$individual_action.action_id}</td>
                                            <td class="text-center">{$individual_action.action_value}</td>
                                            <td>{$individual_action.error_description}</td>
                                            <td >

                                                <a href="javascript:void(0);" usergroup_id="{$individual_action.usergroup_action_id}" data-open="modal" data-target="#editModal-{$individual_action.usergroup_action_id}" title="edit" class="edit_user" onclick="usergroup_item({$individual_action.usergroup_id}, 'edit');"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                                                <a href="javascript:void(0);" usergroup_id="{$individual_action.usergroup_action_id}" title="delete" class="delete_usergroup_item"  onclick="delete_usergroup_item({$individual_action.usergroup_action_id});"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
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
                    </div>
             
                </div>

 
                

                
                
                </ul>
            {/if}
