<?php
require('../inc/config.php');

$Assets = new Assets();
$Sanitation = new Sanitation();
$warning = '';


$asset_data = array();
$asset_data['public_name'] = $Sanitation->remove_html($_REQUEST['public_name'], true);
$asset_data['file_description'] =  $purifier->purify($_REQUEST['file_description']);
$asset_data['file_type'] = $Sanitation->remove_html($_REQUEST['file_type'], true);

$asset_data['file'] = $_FILES['file-0'];
$asset_data['file_extension'] = @array_pop(explode('.',$asset_data['file']['name']));

$basename = basename( $asset_data['file']['name']);
$uniqid = md5(date("Y-m-d G:i:s"));
$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $basename);
$asset_data['local_file_name'] = $withoutExt.'_'.$uniqid.'.'.$asset_data['file_extension'];
if ($asset_data['public_name'] == '')
{
    $asset_data['public_name'] = $withoutExt;
}

list($width, $height, $type, $attr) = getimagesize($asset_data['file']['tmp_name']);


if ($width != '' && $height != '') {
    if ($asset_data['file_type'] != 'image')
    {
        $warning = 'Data type for the file is image not '.$asset_data['file_type'];
        $asset_data['file_type'] = 'image';

    }
}
else
{
    $width = 0;
    $height = 0;
}


$asset_data['image_width'] = $width;
$asset_data['image_height'] = $height;

$asset_data['file_size'] = $asset_data['file']['size']; // 1024; transform from bytes to Kb

$validate_form = $Assets->validate_asset($asset_data);

if (empty($validate_form))
{
    $asset_id = $Assets -> add_asset($asset_data);
    if (is_numeric($asset_id))
    {
        $response = 'ok';
    }
    else
    {
        $response = $asset_id;
    }

}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('message'=>$response, 'warning' => $warning), true);

/* Return JSON */
die($json_encoded);
