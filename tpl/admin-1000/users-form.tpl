<div class="error_message" id="error_message">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>

<script>
$( document ).ready(function() {
    countChar_user_management_first("{$user.user_name}",{$username_max_length}); 
});
</script>

<form name="problem" class="form_users_edit" id="frm_admin"  user_id="{$user.user_id}" action="{$admin_new_user_url}" method="post">

    <input type="hidden" name="user_id" value="{$user.user_id}" autocomplete="off">
    
    <input type="hidden" name="username_max_length" value="{$CT_USERNAME_MAX_LENGTH}" autocomplete="off">
    
    {if !$user.user_id}
    <input type="hidden" name="action_type" value="add" autocomplete="off">
    {/if}

    <div class="small btn-danger pull-right" id="edit_user_top_right">Char. <span id="charNum_user_name">0/{$username_max_length}</span></div>
    <input type="text" name="user_name_add" class="form-control" placeholder="User Name " onkeyup="countChar_user_management(this,{$username_max_length})" autocomplete="off"  id="login_email" value="{$user.user_name}"/>

    <input type="text" name="email_add_user" class="form-control" placeholder="User Email " autocomplete="off"  id="login_email" value="{$user.email}"/>

    <input type="text" name="password_add_user" class="form-control" placeholder="Pasword" autocomplete="off"  id="login_pass" value="" />

    <select  name="usergroup_id" id="user_type" class="form-control" >
        <option selected disabled value="" style="display:none;">Select Usergroup</option>
    {foreach from=$usergroups item="usergroup"}
        <option value="{$usergroup.usergroup_id}" {if $usergroup.usergroup_id == $user.usergroup_id}selected{/if}>{$usergroup.usergroup_name}</option>
    {/foreach}
    </select>

    <!--<input class="" type="button" value="Salveaza" user_id="{$user.user_id}" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>

