<div class="table-responsive">
    <table class="table table-hover" id="errors_table">
        <thead>
        <tr>
            <th>Crt.</th>
            <th>Log time</th>
            <th>Severity</th>
            <th>Description</th>
            <th>Location</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$allErrors item=error name=errors}
            <tr>
                <td>{$error.event_id}</td>
                <td>{$error.log_time}</td>
                <td>{$error.severity}</td>
                <td>{$error.error_description}</td>
                <td>{$error.code_location_info}</td>
            </tr>
            {foreachelse}
            <tr>
                <td colspan="5" class="text-center">No errors for the moment</td>
            </tr>
        {/foreach}

        </tbody>
    </table>
</div>

{if  $no_of_page > 1 }
    <div class="paginare  bottom" id="paginare_bottom">
        <div id="more_results_container"><a href="javascript:void(0);" id="more_results" onclick="pagination_errors('{$s_page+1}','{$no_of_page}');">See more results</a></div>
    </div>
{else}
    <div class="paginare  bottom" id="paginare_bottom">
        <div id="more_results_container">These are all the results</div>
    </div>
{/if}
