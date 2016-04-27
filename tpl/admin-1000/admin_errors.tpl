{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Errors Management </h2>

            <div class="clear" style="height:15px;"> </div>

            <div ><a href="javascript:void(0);" id="clear_all_trigger">Clear all errors</a></div>

            {include file="{$tpl_folder}/admin_errors_list.tpl"}

        </div>

    </div>

</div>


{* {include file="{$tpl_folder_root}/footer.tpl"} *}
