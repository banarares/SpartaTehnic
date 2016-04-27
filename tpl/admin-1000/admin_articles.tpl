{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Articles</h2>

            <div class="clear" style="height:15px;"> </div>
            <div class="filter_holder {if $searched}activ{/if}" {if $searched}style="display:block;"{/if}>
                <form id="filter_user_frm" action="{$admin_articles_url}" method="get">
                    <input type="hidden" name="action" value="admin-articles">
                    <input type="text" name="s_title" class="pb_input_title" placeholder="Name"  id="s_title" value="{$s_title}"/>
                    <input type="text" name="s_date_start" class="pb_input_title datepicker" placeholder="Start Date"  id="s_date_start" value="{$s_date_start}"/> -
                    <input type="text" name="s_date_end" class="pb_input_title datepicker" placeholder="End Date"  id="s_date_end" value="{$s_date_end}"/>

                    <input type="submit" name="Submit" value="Search" class="search" />
                    <input type="button" name="Reset" value="Reset" class="reset-btn" />

                </form>
            </div>

            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="article_item('', 'add', event);">Add New Article </a></div>

            <div class="clear" style="height:15px;"> </div>

            {if $current_articles == 1}
                <script>
                    //get threads for some defaults links
                    current_articles();
                </script>
            {/if}

                {include file="{$tpl_folder}/articles_list.tpl"}


        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="articleModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="articleModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_article('frm_article');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="showArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="showArticleModalLabel">Article - All versions</h4>
            </div>
            <div class="modal-body" id="showArticleModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<script>
    $(document).ready(function()
    {
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location = "/admin-1000/?action=admin-articles";
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
