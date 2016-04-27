<div id="list_results">

    {if $no_of_page>0}
        <div class="last_item" style="display: none;">{$no_of_page}</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_emails('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_emails('{$start}');return false;">{$start}</a>
                        </li>
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_emails('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}

    <div class="clear">&nbsp;</div>
    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="/img/loading.gif"></div>
    <div class="clear">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Creation date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {foreach $list_of_emails as $email_management}
                <tr >
                    <td>{$email_management.email_management_id}</td>
                    <td><span style="margin-right: 5px;" id="icon-status-{$email_management.email_management_id}" class="glyphicon {if $email_management.status == 1} {else} glyphicon-alert text-error{/if}"></span><div style="display: inline-block;" id="open-position-full_name-{$email_management.email_management_id}">{$email_management.full_name}</div></td>
                    <td><div id="open-position-email-{$email_management.email_management_id}">{$email_management.email}</div></td>
                    <td><div id="open-position-creation-date-{$email_management.email_management_id}">{$email_management.creation_date}</div></td>

                    <td>
                        <a href="javascript:void(0);" current-status="{$email_management.status}" id="update-status-{$email_management.email_management_id}" title="{if $email_management.status == 1}Disable{else}Enable{/if}" {if $email_management.status == 1}class="text-success"{else}class="text-error"{/if} onclick="update_email_management_status({$email_management.email_management_id}, event);"><span aria-hidden="true" class="glyphicon {if $email_management.status == 1} glyphicon-ok{else} glyphicon-ok{/if}"></span></a> &nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0);" title="Edit" onclick="edit_email_management({$email_management.email_management_id});" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" title="Delete" onclick="remove_email_management({$email_management.email_management_id}, event);"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
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

    {if $no_of_page>0}
        <div class="paginare  bottom">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_emails('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_emails('{$start}');return false;">{$start}</a>
                        </li>
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_emails();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_emails('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}

</div>


