<div class="error_message" id="error_message_save_email">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>
<form name="problem" class="form_admin_edit" id="frm_email_save" action="" method="post">

    <input type="hidden" name="page_no" value="{$page_no}">

    <input type="hidden" name="email_management_id" id="email_management_id" value="{$emailInfo.email_management_id}">

    <input type="text" name="full_name" class="pb_input_title" placeholder="Full Name"  id="full_name" value="{$emailInfo.full_name}"/>

    <input type="text" name="email" class="pb_input_title" placeholder="Email"  id="email" value="{$emailInfo.email}"/>

</form>
