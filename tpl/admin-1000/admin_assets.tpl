{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}


<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Assets Management</h2>

            <div class="filter_holder {if $searched}activ{/if}" {if $searched}style="display:block;"{/if}>
                <form id="filter_user_frm" action="{$admin_assets_url}" method="get">
                    <input type="hidden" name="action" value="admin-assets">
                    <input type="text" name="s_public_name" class="pb_input_title" placeholder="Public name"  id="s_public_name" value="{$s_public_name}"/>
                     <select name="s_file_type" class=""  id="s_file_type" style="width: 150px!important;">
                        <option value="">- file type -</option>
                        <option value="image" {if $s_file_type == 'image'} selected {/if} >image</option>
                        <option value="document" {if $s_file_type == 'document'} selected {/if} >document</option>
                        <option value="sound" {if $s_file_type == 'sound'} selected {/if} >sound</option>
                    </select>
                    <input type="text" name="s_date_start" class="pb_input_title datepicker" placeholder="Start Date"  id="s_date_start" value="{$s_date_start}"/> -
                    <input type="text" name="s_date_end" class="pb_input_title datepicker" placeholder="End Date"  id="s_date_end" value="{$s_date_end}"/>
                    <input type="submit" name="Submit" value="Search" class="search" />
                    <input type="button" name="Reset" value="Reset" class="reset-btn" />

                </form>
            </div>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  id="new_file_trigger">Upload New File</a></div>

            <div class="clear" style="height:15px;"> </div>

            <div class="error_message" id="asset_error_message">

                {if $error != ''}
                    {$error}
                {else}
                {/if}

            </div>

            <div class="clear" ></div>

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

