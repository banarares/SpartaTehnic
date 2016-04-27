<div class="error_message" id="error_messaj_{$asset.asset_id}">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>
<form name="problem" class="form_asset_edit" id="frm_edit_asset" asset_id="{$asset.asset_id}" action="{$admin_assets_edit_url}" method="post">

    <input type="hidden" name="redirect_page" id="redirect_page" value="">

    <input type="hidden" name="menu_id" id="menu_id" value="{$asset.menu_id}">

    <input type="hidden" name="page_no" value="{$page_no}">

    <input type="hidden" name="asset_id" value="{$asset.asset_id}">

    <div class="form-group">
        <input type="text" class="form-control" id="public_name" name="public_name" value="{$asset.public_name}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="file_description" name="file_description" placeholder="Short description" value="{$asset.file_description}">
    </div>
    <div>
        <select class="form-control" name="file_type" id="file_type" {if $asset.file_type == 'image'}disabled="disabled"{/if}>
            <option value="">- file type -</option>
            <option value="image" {if $asset.file_type == 'image'} selected {/if} >image</option>
            <option value="document" {if $asset.file_type == 'document'} selected {/if} >document</option>
            <option value="sound" {if $asset.file_type == 'sound'} selected {/if} >sound</option>
        </select>
        {if $asset.file_type == 'image'}<input type="hidden" name="file_type" value="image">{/if}
    </div>


    <!--<input class="" type="button" value="Salveaza" asset_id="{$asset.asset_id}" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
