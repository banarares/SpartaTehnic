
        {foreach from=$all_errors  item=error}

            <tr>
                <td>{$error.event_id}</td>
                <td>{$error.log_time}</td>
                <td>{$error.severity}</td>
                <td>{$error.error_description}</td>
                <td>{$error.code_location_info}</td>
            </tr>

        {/foreach}

