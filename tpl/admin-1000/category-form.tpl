<div class="error_message" id="error_message">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>
<form name="frm_category" class="form_category" id="frm_category" method="post">

    <input type="hidden" name="category_id" value="{$category.category_id}">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{$category.name}">
    </div>

    <div class="form-group">
        <label for="display_order">Display order</label>
        <input type="text" class="form-control" id="display_order" name="display_order" value="{$category.display_order}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" id="status" >
            <option value="1" {if $category.status == '1'} selected {/if} >Active</option>
            <option value="0" {if $category.status == '0'} selected {/if} >Inactive</option>
        </select>
    </div>


    <input type="hidden" name="action_type" value="{$action_type}">
    

    <!--<input class="" type="button" value="Salveaza" category_id="{$category.category_id}" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
