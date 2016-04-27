<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Users = new Users();
$Sanitation = new Sanitation();

$form_data = array();
$form_data['user_name'] = $Sanitation->remove_html($_REQUEST['user_name'], true);
$form_data['email']= strip_tags($_REQUEST['email']);
$form_data['password'] = $Sanitation->remove_html($_REQUEST['password'], true);
$form_data['user_type'] = $Sanitation->remove_html($_REQUEST['user_type'], true);
$form_data['action_type']= 'edit';
$form_data['user_id'] = abs(intval($_REQUEST['user_id']));
 
$form_data['country'] = $Sanitation->remove_html($_REQUEST['country'], true);
$form_data['location'] = $Sanitation->remove_html($_REQUEST['location'], true);
$form_data['birth_date_day'] = $Sanitation->remove_html($_REQUEST['user_birth_date_day'], true);
$form_data['birth_date_month'] = $Sanitation->remove_html($_REQUEST['user_birth_date_month'], true);
$form_data['birth_date_year'] = $Sanitation->remove_html($_REQUEST['user_birth_date_year'], true);

$form_data['birth_date'] = $form_data['birth_date_year'].'-'.$form_data['birth_date_month'].'-'.$form_data['birth_date_day'];


$validate_form = $Users->validate_user_admin($form_data);

if (empty($validate_form))
{
    if (!empty($config['IMAGES_RESIZE']) && !empty($_FILES))
    {
        $tmpFilePath = $_FILES['myfiles']['tmp_name'];
        $avatarsFilePath = $config['CT__AVATAR_UPLOAD_PATH'];
        $extensions = explode('.',$_FILES['myfiles']['name']);
        $avatarExtension = '.'.$extensions[count($extensions)-1];
        $originalName = 'image_'.uniqid();

        $form_data['has_avatar'] = 1;
        $form_data['avatar_name'] = $originalName.$avatarExtension;
        $form_data['avatar_path'] = $config['CT__AVATAR_FOLDER'].$form_data['avatar_name'];

        list($width, $height, $type, $attr) = getimagesize($_FILES['myfiles']['tmp_name']);
        $form_data['avatar_width'] = $width;
        $form_data['avatar_height'] = $height;

        $originalAvatar = $avatarsFilePath.$form_data['avatar_name'];
        move_uploaded_file($tmpFilePath, $originalAvatar);

        foreach ($config['IMAGES_RESIZE'] as $index => $resizeInfo) {
            $image = new Image($originalAvatar);
            $width = $resizeInfo['width'];
            $height = $resizeInfo['height'];
            $image->resize($width, $height);
            $newName = $originalName.$resizeInfo['suffix'].$avatarExtension;
            $image->save($avatarsFilePath.$newName);
        }

        //unlink previous avatars if are any
        $userInfo = $Users -> fetch_user_by_id($form_data['user_id']);
        if ($userInfo['has_avatar'] == 1 || $userInfo['has_name'] != '')
        {
            $avatarNamePath = $userInfo['avatar_name'];
            $extensions = explode('.',$avatarNamePath);
            $avatarExtension = '.'.$extensions[1];
            $avatarName = $extensions[0];

            foreach ($config['IMAGES_RESIZE'] as $index => $resizeInfo) {
                if (file_exists($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$config['IMAGES_RESIZE'][$index]['suffix'].$avatarExtension))
                {
                    unlink($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$config['IMAGES_RESIZE'][$index]['suffix'].$avatarExtension);
                }

            }
            if (file_exists($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$avatarExtension))
            {
                unlink($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$avatarExtension);
            }

        }
    }
    $user_id = $Users -> update_user($form_data);
    $response = 'ok';
}
else
{
    $response = implode('',$validate_form);
}


$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
