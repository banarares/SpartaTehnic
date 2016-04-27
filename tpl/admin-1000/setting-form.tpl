<div class="error_message" id="error_message">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>
<form name="frm_setting" class="form_setting" id="frm_setting" method="post">

    <input type="hidden" name="setting_id" value="{$setting.setting_id}">

    <div class="form-group">
        <label for="setting_name">Name</label>
        <input type="text" class="form-control" id="setting_name" name="setting_name" value="{$setting.setting_name}">
    </div>

    <div class="form-group">
        <label for="setting_value">Value</label>
        <textarea style="width: 100%; height: 100px;" name="setting_value" id="setting_value">{$setting.setting_value}</textarea>
    </div>


    <!--<input class="" type="button" value="Salveaza" setting_id="{$setting.setting_id}" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
