{include file="{$tpl_folder_admin}/header-admin.tpl"}

<head>
            {if $current_assets == 1}
                <script>
                    //get threads for some defaults links
                    current_assets();
                </script>
            {/if}
</head>
<body>


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
        <h2 class="tell_pb left">{$pageTitle}</h2>

            {include file="{$tpl_folder_admin}/admin_filter_browse_assets.tpl"}

            <input type="hidden" name="CKEditorFuncNum" id="CKEditorFuncNum" value="{$CKEditorFuncNum}">
            
            <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="{$IMAGES_PATH_DIR}/loading.gif"></div>
            <div class="clear">&nbsp;</div>



            <div id="list_results">            



            {if $no_of_page>0}
                <div class="last_item" style="display: none;">{$no_of_page}</div>
                <div class="paginare">
                    <ul class="list_pagination">
                        <li>
                            <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_browse_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                        {for $start=1 to $no_of_page}
                            {if $start >= $min_page && $start <= $max_page}
                                <li {if $start == $page_no} class="curent_item"{/if}>
                                    <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_browse_assets('{$start}');return false;">{$start}</a>
                                </li>
                            {/if}
                        {/for}
                        <li>
                            <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_browse_assets('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            {/if}

            <div class="clear">&nbsp;</div>
            <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="{$images_path_dir}/loading.gif"></div>
            <div class="clear">&nbsp;</div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr> 
                        <th class="filter filter_user_id format_id">Id
                            <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=asset_id&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                <span class="{$arrow_id}"></span>
                            </a>                
                        </th>
                         
                        <th class="filter filter_user_name format_name">Public name
                            <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=public_name&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                <span class="{$arrow_name}"></span>
                            </a>
                        </th>
                        <th class="format_type">Type
                           <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_type&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                <span class="{$arrow_type}"></span>
                            </a>
                        </th>
                        <th>Size
                           <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_size&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                <span class="{$arrow_size}"></span>
                            </a>
                        </th>
                        
                        <th class="filter filter_user_name format_name">Description
                           <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=file_description&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
                                <span class="{$arrow_description}"></span>
                            </a>
                        </th>
                        <th class="format_creation_date">Created Date
                           <a href="{$link_pagination}?pageId=1&input_file_url=social_media_image&type=image&source=non_ckeditor{if $s_asset_id!==0}&s_asset_id={$s_asset_id}{/if}&type={$s_file_type}&filter=creation_date&s_name={$s_name}&s_description={$s_description}&s_date_start={$s_date_start}&s_date_end={$s_date_end}&sort={if $sort==0}1{else}0{/if}#{$link_ajax}pagina=1">
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
                            
                            <button name="select_asset" onclick="select_asset(this);" class="select_asset btn btn-default" url-path="{$assets_path_dir}/{$assets.local_file_name}" img-alt="{$assets.file_description}">Select asset</button>
                            
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
                            <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_browse_assets('1');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                        </li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                        {for $start=1 to $no_of_page}
                            {if $start >= $min_page && $start <= $max_page}
                                <li {if $start == $page_no} class="curent_item"{/if}>
                                    <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_browse_assets('{$start}');return false;">{$start}</a>
                                </li>
                            {/if}
                        {/for}
                        <li>
                            <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_browse_assets();return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                        <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_browse_assets('{$no_of_page}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
            {/if}

        </div>

    </div>

</div>
<script>
    //var source = '{$source}';
    //var input_file_id = '{$input_file_url}';
    var source = '';
    var input_file_id = '{$input_file_url}';
</script>
{literal}
    <script>
        function select_asset(element)
        {
            if (source == '' || typeof source == 'undefined') {
                source = getUrlParameter('source');
            }
            if (input_file_id == '') {
                input_file_id = getUrlParameter('input_file_url');
            }
            // console.log(source);
            if (source == '' || typeof source == 'undefined')
            {
                source = 'ckeditor';
            }
            // console.log(source);
            // console.log(input_file_id);

            var fileSrc = $(element).attr("url-path");
            var fileSrcAlt = $(element).attr("img-alt");
            if (source == 'ckeditor')
            {
                var CKEditorFuncNum =$("#CKEditorFuncNum").val();
                window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, fileSrc);
                window.opener.$("label:contains('Alternative Text')").next().find("input[class='cke_dialog_ui_input_text']").val(fileSrcAlt);
            }
            else
            {

                // Set them to the parent window
                window.opener.$("#"+input_file_id).val(fileSrc);
                if (input_file_id == 'edit_form_video_image_url') // need to set a preview for Edit Form Fields
                {
                    window.opener.$("#edit_form_video_image_url_preview").attr('src',fileSrc);
                }
            }

            // Close the popup
            window.close();
        }
        /*  $(document).ready(function()
         {
         $( ".select_asset" ).click(function() {

         //select_asset($(this));

         console.log(source);
         console.log(input_file_id);

         if (source == '') {
         source = getUrlParameter('source');
         }
         if (input_file_id == '') {
         input_file_id = getUrlParameter('input_file_url');
         }
         if (source == '')
         {
         source == 'ckeditor';
         }
         console.log(source);
         console.log(input_file_id);

         var fileSrc = $(this).attr("url-path");
         var fileSrcAlt = $(this).attr("img-alt");
         if (source == 'ckeditor')
         {
         var CKEditorFuncNum =$("#CKEditorFuncNum").val();
         window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, fileSrc);
         window.opener.$("label:contains('Alternative Text')").next().find("input[class='cke_dialog_ui_input_text']").val(fileSrcAlt);
         }
         else
         {

         // Set them to the parent window
         window.opener.$("#"+input_file_id).val(fileSrc);
         if (input_file_id == 'edit_form_video_image_url') // need to set a preview for Edit Form Fields
         {
         window.opener.$("#edit_form_video_image_url_preview").attr('src',fileSrc);
         }
         }

         // Close the popup
         //window.close();

         });
         });*/

    </script>
{/literal}
</body>
</html>

