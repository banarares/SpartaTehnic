<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Users = new Users();

$user_id =  abs(intval($_REQUEST['user_id']));
$user_id = abs(intval($user_id));

$userInfo = $Users -> fetch_user_by_id($user_id);
$Users -> delete_user($user_id);

//unlink avatars if are any
if ($userInfo['has_avatar'] == 1 || $userInfo['has_name'] != '')
{
    $avatarNamePath = $usersInfo['avatar_name'];
    $extensions = explode('.',$avatarNamePath);
    $avatarExtension = '.'.$extensions[1];
    $avatarName = $extensions[0];

    foreach ($config['IMAGES_RESIZE'] as $index => $resizeInfo) {
        unlink($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$config['IMAGES_RESIZE'][$index]['suffix'].$avatarExtension);
    }
    unlink($config['CT__AVATAR_UPLOAD_PATH'].$avatarName.$avatarExtension);
}

$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
