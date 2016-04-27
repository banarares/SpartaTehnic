<form name="problem" id="form_files" class="form_users" action="?action=admin-add-usergroup" method="post" > 
                <div class="clear" style="height:15px;"> </div>
                <div>
                        <div class="form-group">
                            <h4>Select user type</h4>
                            <select name="usergroup" class="form-control btn-primary">
                                {foreach from=$usergroup_obj item="usergroup"}

                                    <option  value="{$usergroup.usergroup_name}">{$usergroup.usergroup_name}</option>

                                {/foreach}
                            </select>        
                        </div>
                        <div class="form-group">
                            <h4>Select action id</h4>
                            <select name="action_id" class="form-control btn-primary">
                                {foreach from=$actions item="indiv_action"}

                                    <option  value="{$indiv_action.action_id}" >{$indiv_action.action_id} - {$indiv_action.action_name} </option>

                                {/foreach}
                            </select>    
                        </div>
                        <div>
                        <div class="form-group">
                            <h4>Error description</h4>
                            <textarea name="usergroup_error_description" class="form-control btn-primary" placeholder="Describe the error for this usergroup's action"></textarea>    
                        </div>
                        </div>
                        <input type="submit" class="btn btn-primary" id="upload_btn" name="Start Uploading" value="Add Usergroup" />

                </div>
</form>