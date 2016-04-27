
<div class="error_message" id="error_message">


    {if $error != ''}
        {$error}
    {else}
    {/if}
        

</div>



{if $action_type == 'edit'} 

{foreach from=$usergroup item="selected_usergroup"}
<script>
$( document ).ready(function() {
    countChar_name_first("{$selected_usergroup.usergroup_name}",{$usergroup_max_length});
    countChar_description_first("{$selected_usergroup.usergroup_description}", {$usergroup_description_max_length});
});
</script>



<form name="problem" class="form_usergroup_edit" id="frm_usergroup"  usergroup_id="{$selected_usergroup.usergroup_id}" action="{$admin_add_usergroup_url}" method="post">


    <input type="hidden" name="usergroup_id" value="{$selected_usergroup.usergroup_id}" />


    <div class="form-group">

        <h4>Usergroup name</h4>
        <div class="small  pull-right" id="usergroup_name" >Char. <span id="charNum_name">0/{$usergroup_max_length}</span></div>          

        <input name="usergroup_name" class="form-control " onkeyup="countChar_name(this, {$usergroup_max_length})" value="{$selected_usergroup.usergroup_name}" />
         
    </div>

    <div class="form-group">

        <h4>Usergroup description</h4>
                <div class="small btn-success pull-right" id="usergroup_description" >Char. <span id="charNum_description" >0/{$usergroup_description_max_length}</span></div>

        <textarea name="usergroup_description" class="form-control " id="field" onkeyup="countChar_description(this, {$usergroup_description_max_length})" placeholder="Describe usergroup">{$selected_usergroup.usergroup_description}</textarea>

    </div>

 	

</form>
{/foreach}

{else}
<form name="problem" class="form_usergroup_edit" id="frm_usergroup" action="{$admin_add_usergroup_add_url}" method="post">
    <input type="hidden" name="usergroup_id" value="" />
   <div class="form-group">

        <h4>Usergroup name</h4>
        <div class="small btn-danger pull-right" id="usergroup_name" >Char. <span id="charNum_name">0/{$usergroup_max_length}</span></div>          

        <input name="usergroup_name" class="form-control "  onkeyup="countChar_name(this, {$usergroup_max_length})" />

    </div>

    <div class="form-group">

        <h4>Usergroup description</h4>
        <div class="small btn-success pull-right" id="usergroup_description" >Char. <span id="charNum_description" >0/{$usergroup_description_max_length}</span></div>

        <textarea name="usergroup_description" class="form-control " id="field" onkeyup="countChar_description(this, {$usergroup_description_max_length})" placeholder="Describe usergroup"></textarea> 

    
    </div>
</form>
{/if}

