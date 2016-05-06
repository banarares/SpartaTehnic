<div class="error_message" id="error_message">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>
<form name="frm_article" class="form_article_edit" id="frm_article" method="post">

    <input type="hidden" name="page_no" id="page_no" value="{$page_no}">

    <input type="hidden" name="article_id" id="article_id" value="{$article.article_id}">

    <div class="form-group">
        <label for="category_id">* Category</label>
        <select name="category_id" id="category_id">
            <option value=""> - category - </option>
            {foreach from=$categories_list item=category name=category}
                <option value="{$category.category_id}"  {if $category.category_id == $article.category_id}selected{/if}>{$category.name}</option>
            {/foreach}
        </select>
    </div>

    <div class="form-group">
        <label for="title">* Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{$article.title}">
    </div>
    <div class="form-group">
        <label for="title">Short Title</label>
        <input type="text" class="form-control" id="short_title" placeholder="Short Title" name="short_title" value="{$article.short_title}">
    </div> 
    <div class="well" style="font-size:9pt;"><div><strong style="color:red;">NOTE:</strong></div> * Title and Short Title can contain alfanumeric, spaces and punctuation charachters</div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="{$article.meta_description}">
    </div>

    <div class="form-group">
        <label for="meta_description">Social media image</label>
        <div class="image_inputs">
            <input type="text" name="social_media_image" id="social_media_image" class="pb_input_title form_data_title" placeholder="Social media image url" value="{$article.social_media_image}"/>
            {if $article.social_media_image != ''}
                <img src="{$article.social_media_image}" width="100">
            {/if}
        </div>
        <div class="image_actions">
            <button  class="image_sections" onclick="openBrowseServer('social_media_image', event);">Browse server</button> <div class="image_sections">OR</div>
            <div class="custom-file-upload">
                <input type="file" id="social_media_image_upload" name="social_media_image_upload"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="version_1">* Content</label>
        <textarea class="mesaj_content" id="version_1" name="version_1" >{$article.version_1}</textarea>
        <script>
            CKEDITOR.replace( 'version_1' );
            //$('#version_1').html(CKEDITOR);
        </script>
    </div>
    <div class="form-group small well">
        <label><strong style="color:red;">NOTE:</strong></label>
        <div>For iframe and website link, please use the following formats (in source mode)</div>
        <label>Youtube iframe</label>
        <textarea style="width: 100%; height: 80px; font-size: 12px; padding:4px"><div class="youtube_holder" >
    <iframe src="//www.youtube.com/embed/XRRnY1yQOR4?rel=0" frameborder="0" allowfullscreen></iframe>
</div></textarea>

        <label>Website link</label>
        <textarea style="width: 100%; height: 80px; font-size: 12px; padding:4px"><a href="//hemostop.ro" class="seo_tools">
    <span style="color: #333;">Visit</span> www.HemoStop.ro
</a></textarea>
    </div>
    <!--<div class="form-group">
        <label for="youtube_link">Youtube Link</label>
        <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="Youtube Link" value="{$article.youtube_link}">
    </div>-->

    <div class="form-group">
        <label >Is primary </label>
        <input class="radio-inline" type="radio" name="is_primary" value="1" {if $article.is_primary == '1'} checked {/if} style="width: 30px; height: 30px; border:1px solid #444;"> Yes
        <input class="radio-inline" type="radio" name="is_primary"  value="0" {if $article.is_primary == '0'} checked {/if} style="width: 30px; height: 30px; border:1px solid #444;"> No

        <div><small>If is listed on HomePage as main article</small></div>
    </div>

    <div class="form-group">
        <label for="display_order">Display order</label>
        <input type="text" class="form-control" id="display_order" name="display_order" value="{$article.display_order}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" id="status" >
            <option value="1" {if $article.status == '1'} selected {/if} >Active</option>
            <option value="0" {if $article.status == '0'} selected {/if} >Inactive</option>
        </select>
    </div>


    <!--<input class="" type="button" value="Salveaza" article_id="{$article.article_id}" class="btn btn-primary edit_user_action" name="save_user"/>-->
</form>
<div class="error_message" id="error_message">

    {if $error != ''}
        {$error}
    {else}
    {/if}

</div>