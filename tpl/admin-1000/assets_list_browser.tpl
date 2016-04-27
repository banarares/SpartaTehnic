<!doctype html>
<html>
<head>
    <title>Admin CMS MS</title>

    <meta name="viewport" content="width=1024" />
    <meta charset="utf-8" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >

    <link href="{$root_url}/css/style.css" rel="stylesheet" type="text/css" />

    <link href="{$root_url}/admin-1000/css/style_admin.css" rel="stylesheet" type="text/css" />
    <link href="{$root_url}/admin-1000/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{$root_url}/admin-1000/js/bootstrap-datepicker.min.js"></script>

    {if $action == 'admin-assets'}
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    {/if}



    <script src="{$root_url}/admin-1000/js/main_admin.js"></script>


</head>
<body>
<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <input type="hidden" name="CKEditorFuncNum" id="CKEditorFuncNum" value="{$CKEditorFuncNum}">
            <h2 class="tell_pb left">{$pageTitle}</h2>
            <div id="loading" {if $current_thread == 1}style="text-align: center; display:block; margin:25px 0;"{else}style="text-align: center; display:none; margin:25px 0;"{/if}><img src="{$IMAGES_PATH_DIR}/loading.gif"></div>
            <div class="clear">&nbsp;</div>
            <div id="list_results">
                {if $no_of_page>0}
                    <div class="last_item" style="display: none;">{$no_of_page}</div>
                    <div class="paginare">
                        <ul class="list_pagination">
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_assets('1', 'browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                            </li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_assets('browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                            {for $start=1 to $no_of_page}
                                {if $start >= $min_page && $start <= $max_page}
                                    <li {if $start == $page_no} class="curent_item"{/if}>
                                        <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}" onclick="pagination_assets('{$start}', 'browser', '{$assets_type}');return false;">{$start}</a>
                                    </li>
                                {/if}
                            {/for}
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_assets('browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_assets('{$no_of_page}', 'browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                    </div>
                {/if}
                <div class="clear">&nbsp;</div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Asset id</th>
                            <th>Download</th>
                            <th>Public name</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Dimensions</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach from=$allAssets item=assets name=assets}
                            <tr>
                                <td>{$assets.asset_id}</td> 
                                <td>{if $assets.file_type == 'image'}<a href="{assets_path_dir}/thumbs/{$assets.local_file_name}.{$assets.file_extension}" target="_blank"><img src="../assets/thumbs/{$assets.local_file_name}.{$assets.file_extension}" width="20" alt="{$assets.file_description}"></a>{else}<a href="{$assets_path_dir}/{$assets.local_file_name}" target="_blank">View File</a>{/if}</td>
                                <td>{$assets.public_name}</td>
                                <td>{$assets.file_type}</td>
                                <td>{$assets.file_size}</td>
                                <td>{$assets.image_width} x {$assets.image_height}</td>
                                <td>{$assets.file_description}</td>
                                <td>{$assets.creation_date}</td>
                                <td width="100">
                                    <button name="select_asset" onclick="select_asset(this);" class="select_asset btn btn-default" url-path="{$assets_path_dir}/{$assets.local_file_name}" img-alt="{$assets.file_description}">Select asset</button>
                                </td>
                            </tr>
                            {foreachelse}
                            <tr>
                                <td colspan="7" class="text-center">No results</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>

                {if $no_of_page>0}
                    <div class="paginare  bottom">
                        <ul class="list_pagination">
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina=1" class="to_left_left" onclick="pagination_assets('1', 'browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a>
                            </li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$page_no-1}" class="to_left" onclick="javascript:prev_assets('browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a></li>
                            {for $start=1 to $no_of_page}
                                {if $start >= $min_page && $start <= $max_page}
                                    <li {if $start == $page_no} class="curent_item"{/if}>
                                        <a   href="{$link_pagination}#{$link_ajax}pagina={$start}" class="pagination_item {if $start == $page_no} curent_item{/if}" id="{$start}botom" onclick="pagination_assets('{$start}', 'browser', '{$assets_type}');return false;">{$start}</a>
                                    </li>
                                {/if}
                            {/for}
                            <li>
                                <a  href="{$link_pagination}#{$link_ajax}pagina={$page_no+1}" class="to_right" onclick="javascript:next_assets('browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></li>
                            <li><a  href="{$link_pagination}#{$link_ajax}pagina={$no_of_page}" class="to_right_right" onclick="pagination_assets('{$no_of_page}', 'browser', '{$assets_type}');return false;"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                    </div>
                {/if}

            </div>
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
