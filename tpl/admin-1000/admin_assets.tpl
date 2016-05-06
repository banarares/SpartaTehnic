{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Assets Management</h2>

            <div><a href="javascript:void(0);"  id="new_file_trigger">Upload New File</a></div>

            <div class="error_message" id="asset_error_message">

                {if $error != ''}
                    {$error}
                {else}
                {/if}

            </div>

            <div class="clear"></div>

            <form name="problem" id="form_files" class="form_users" action="{$admin_assets_add_url}" method="post" style="display: {if $error}block{else}none{/if};">
                <div class="clear" style="height:15px;"> </div>
                <div>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="fileToUpload"/><br/>
                            <div id="progressbar"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="public_name" name="public_name" placeholder="Public name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="file_description" name="file_description" placeholder="Short description">
                        </div>
                        <div>
                            <select class="form-control" name="file_type" id="file_type">
                                <option value="">- file type - </option>
                                <option value="image">image</option>
                                <option value="document">document</option>
                                <option value="sound">sound</option>
                            </select>
                        </div>
                        <input type="button" id="upload_btn" name="Start Uploading" value="Start Uploading" />
                    </form>

                </div>
            </form>


            {if $current_assets == 1}
                <script>
                    //get threads for some defaults links
                    current_assets();
                </script>
            {/if}

            {include file="{$tpl_folder}/admin_filter_assets.tpl"}
            {include file="{$tpl_folder}/assets_list.tpl"}
        </div>

    </div>

</div>


<script>
    $(document).ready(function()
    {
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location = "/admin-1000/?action=admin-assets";
        });

        var startDate = new Date('01/01/2015');
        var FromEndDate = new Date();
        var ToEndDate = new Date();

        $('#s_date_start').datepicker({

            weekStart: 1,
            startDate: startDate,
            endDate: FromEndDate,
            autoclose: true
        })
                .on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#s_date_end').datepicker('setStartDate', startDate);
                });

        $('#s_date_end').datepicker({

            weekStart: 1,
            startDate: startDate,
            endDate: ToEndDate,
            autoclose: true
        })
                .on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#s_date_start').datepicker('setEndDate', FromEndDate);
                });
    });
</script>

{* {include file="{$tpl_folder_root}/footer.tpl"} *}

