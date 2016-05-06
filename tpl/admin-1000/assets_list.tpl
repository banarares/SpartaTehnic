

<div id="list_results">

    {if $no_of_page>0}
        <div class="last_item" style="display: none;">{$no_of_page}</div>
        <div class="paginare">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_assets('{$start}');return false;">{$start}</a>
                        </li>
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_assets('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}

    <div class="clear">&nbsp;</div>
    <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="{$images_path_dir}/loading.gif"></div>
    <div class="clear">&nbsp;</div>
    {if source=='ckeditor'}
    <input type="hidden" name="source" value="ckeditor" form="filter_assets_browse" />
    <input type="hidden" name="CKEditor" value="version_1" form="filter_assets_browse" />
    <input type="hidden" name="CKEditorFuncNum" value="1" form="filter_assets_browse" />
    {/if}


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr> 
                <th class="filter filter_user_id format_id">Id
                    <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=asset_id&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_id}"></span>
                    
                    </a>                
                </th>
                
                <th class="filter filter_user_name format_name">Public name
                    <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=public_name&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_name}"></span>
                    </a>
                </th>
                <th class="format_type">Type
                   <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_type&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_type}"></span>
                    </a>
                </th>
                <th>Size
                   <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_size&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_size}"></span>
                    </a>
                </th>
                
                <th class="filter filter_user_name format_name">Description
                   <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_description&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_description}"></span>
                    </a>
                </th>
                <th class="format_creation_date">Created Date
                   <a href="{$link_pagination}?{if $selection_input }input_file_url=social_media_image&type=image{if $source=='ckeditor'}&source=ckeditor&CKEditor=version_1&CKEditorFuncNum=1{else}&source=non_ckeditor{/if}{else}action=admin-assets{/if}&pageId=1{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=creation_date&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                        <span class="{$arrow_date}"></span>
                    </a>
                </th>
                <th class="format_dimensions">Dimensions</th>
                <th>Download</th>
                <th class="format_actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$allAssets item=assets name=assets}
                <tr>
                    <td>{$assets.asset_id}</td>                    
                    <td>{$assets.public_name}</td>
                    <td>{$assets.file_type}
                      {if $assets.file_type eq 'image'}
                      <br />
                      {$assets.file_extension}
                      {/if}
                    </td>
                    <td>{$assets.file_size}</td>
                    <td>{$assets.file_description}</td>
                    <td>{$assets.creation_date}</td>
                    <td>{$assets.image_width} x {$assets.image_height}</td>
                    <td>{if $assets.file_type == 'image'}<img src="../assets/{$assets.local_file_name}" width="180"> {/if}<a href="../assets/{$assets.local_file_name}" target="_blank">Download</a></td>
                    <td width="100">
                    {if $selection_input }
                    <button name="select_asset" onclick="select_asset(this);" class="select_asset btn btn-default" url-path="{$assets_path_url}/{$assets.local_file_name}" img-alt="{$assets.file_description}">Select asset</button>
                    {else}
                    
                        <a href="javascript:void(0);" current-status="{$assets.is_moderated}" id="update-status-{$assets.asset_id}" asset_id="{$assets.asset_id}" title="{if $assets.is_moderated == 1}Disable{else}Enable{/if}" {if $assets.is_moderated == 1}class="text-success"{else}class="text-error"{/if} onclick="update_asset_moderation_status({$assets.asset_id}, {$assets.is_moderated});"><span aria-hidden="true" class="glyphicon {if $assets.is_moderated == 1} glyphicon-ok{else} glyphicon-ok{/if}"></span></a> &nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0);" asset_id="{$assets.asset_id}" data-open="modal" data-target="#editModal-{$assets.asset_id}" title="edit" class="edit_user" onclick="edit_asset_item({$assets.asset_id}, {$page_no});"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a> &nbsp;
                        <a href="javascript:void(0);" asset_id="{$assets.asset_id}" title="delete" class="delete_article_item"  onclick="delete_asset_item({$assets.asset_id});"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                    {/if}
                    </td>

                </tr>
            {foreachelse}
                <tr>
                    <td colspan="9" class="text-center">No results</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

    {if $no_of_page>0}
        <div class="paginare  bottom">
            <ul class="list_pagination">
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                </li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                {for $start=1 to $no_of_page}
                    {if $start >= $min_page && $start <= $max_page}
                        <li {if $start == $page_no} class="curent_item"{/if}>
                            <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_assets('{$start}');return false;">{$start}</a>
                        </li>
                    {/if}
                {/for}
                <li>
                    <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_assets('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
            </ul>
        </div>
    {/if}

</div>
<!-- Modal -->
<div class="modal fade" id="editAssetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editAssetModalLabel">Edit Asset</h4>
            </div>
            <div class="modal-body" id="editAssetModalBody">

            </div>
            <div class="modal-footer">
                <button form="frm_edit_asset" class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="showAssetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editAssetModalLabel">Asset - details</h4>
            </div>
            <div class="modal-body" id="showAssetModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
