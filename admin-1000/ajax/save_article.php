<?php

require('../inc/config.php');


$Articles = new Articles();
$Sanitation = new Sanitation();
$Assets = new Assets();



$article_id = abs(intval($_REQUEST['article_id']));

$form_data = array();
$form_data['title'] = $Sanitation->remove_html($_REQUEST['title'], true);
$form_data['short_title'] = $Sanitation->remove_html($_REQUEST['short_title'], true);
$form_data['version_1']= $_REQUEST['version_1'];
$form_data['status'] = abs(intval($_REQUEST['status']));
$form_data['display_order'] = abs(intval($_REQUEST['display_order']));
$form_data['category_id'] = abs(intval($_REQUEST['category_id']));
$form_data['meta_description'] = $Sanitation->remove_html($_REQUEST['meta_description'], true);
$form_data['is_primary'] = abs(intval($_REQUEST['is_primary']));
$form_data['social_media_image'] = $Sanitation->remove_html($_REQUEST['social_media_image'], true);

$form_data['article_id'] = abs(intval($_REQUEST['article_id']));

//var_dump($form_data);

$validate_form = $Articles->validate_article($form_data);

if (empty($validate_form))
{
    if ($_FILES['social_media_image_upload']['name'] != '')
    {

        //upload file and save to Assets DB

        $asset_data = array();
        $asset_data['file'] = $_FILES['social_media_image_upload'];
        $asset_data['file_extension'] = @array_pop(explode('.',$asset_data['file']['name']));

        $image_extensions = array('jpg', 'gif', 'png');
        if (!in_array($asset_data['file_extension'], $image_extensions)) {
            $response = 'File need to an image (jpg, gif, png)';
            $json_encoded = json_encode(array('response'=>$response), true);

            /* Return JSON */
            die($json_encoded);
        }
        else
        {
            $basename = basename( $asset_data['file']['name']);

            $asset_data['public_name'] = $basename;
            $asset_data['file_description'] =  'uploaded';
            $asset_data['file_type'] = 'image';


            $uniqid = md5(date("Y-m-d G:i:s"));
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $basename);
            $asset_data['local_file_name'] = $withoutExt.'_'.$uniqid.'.'.$asset_data['file_extension'];
            if ($asset_data['public_name'] == '')
            {
                $asset_data['public_name'] = $withoutExt;
            }

            list($width, $height, $type, $attr) = getimagesize($asset_data['file']['tmp_name']);

            $asset_data['image_width'] = $width;
            $asset_data['image_height'] = $height;

            $asset_data['file_size'] = $asset_data['file']['size']; // 1024; transform from bytes to Kb
            $asset_id = $Assets -> add_asset($asset_data, 1);

            $form_data['social_media_image'] = $root_url.'/assets/'.$asset_data['local_file_name'];
        }

    }
    if ($article_id > 0)
    {
        $article_id = $Articles -> update_article($form_data);
    }
    else
    {
        $article_id = $Articles -> add_article($form_data);
    }

    $response = 'ok';

    // header("Location: $admin_articles_front_url");
}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

exit;
