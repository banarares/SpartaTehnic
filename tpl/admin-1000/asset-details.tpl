<div class="table-responsive">
    <table class="table table-hover">
        {if $asset.file_type == 'image'}
            <tr>
                <td colspan="2">
                    <a href="{$ASSETS_PATH_DIR}/{$asset.local_file_name}" target="_blank"><img src="{$ASSETS_PATH_DIR}/{$asset.local_file_name}" width="20"></a>
                </td>
            </tr>
        {/if}
        <tr>
            <td><strong>Local_file_name</strong></td>
            <td><a href="{$ASSETS_PATH_DIR}/{$asset.local_file_name}" target="_blank">{$asset.local_file_name}</a></td>
        </tr>
        <tr>
            <td><strong>Public_name</strong></td>
            <td>{$asset.public_name}</td>
        </tr>
        <tr>
            <td><strong>File_type</strong></td>
            <td>{$asset.file_type}</td>
        </tr>
        <tr>
            <td><strong>File_description</strong></td>
            <td>{$asset.file_description}</td>
        </tr>
        <tr>
            <td><strong>File_extension</strong></td>
            <td>{$asset.file_extension}</td>
        </tr>
        <tr>
            <td><strong>Dimensions</strong></td>
            <td>{if $asset.file_type == 'image'}{$asset.image_width} x {$asset.image_height} {/if}</td>
        </tr>
        <tr>
            <td><strong>creation_date</strong></td>
            <td>{$asset.creation_date}</td>
        </tr>
        <tr>
            <td><strong>last_updated_date</strong></td>
            <td>{$asset.last_updated_date}</td>
        </tr>

    </table>
</div>
