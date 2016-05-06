{include file="{$tpl_folder}/header-admin.tpl"}
{include file="{$tpl_folder}/admin-top.tpl"}
{if $current_categories == 1}
    <script>
    current_categories();
    </script>
{/if}
<div class="wraper">
    <div class="content-wrap page">

        <div class="content">
            <h2 class="tell_pb left">Blog Categories</h2>
            
            <div class="clear" style="height:15px;"> </div>

            <div><a href="javascript:void(0);"  onclick="category_item('', 'add');">Add New Category </a></div>

            <div class="clear" style="height:15px;"> </div>
            {include file="{$tpl_folder}/admin_filter_categories.tpl"}
            
            <div class="clear" style="height:15px;"> </div>
            
                {include file="{$tpl_folder}/categories-list.tpl"}
           
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="categoryModalLabel">Edit</h4>
            </div>
            <div class="modal-body" id="categoryModalBody">

            </div>
            <div class="modal-footer">
                <button id="frm_modal_btn" class="btn btn-primary" onclick="save_category('frm_category');" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

{*{include file="{$tpl_folder_root}/footer.tpl"}*}
