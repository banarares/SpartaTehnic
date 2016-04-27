<?php
include "inc/config.php";

$action = filter_var($_REQUEST ['action'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$errors = array();

switch($action)
{
    case 'home':
    case 'products':
    case 'about':
    break;
    default:
    if ($action != '')
        {
            $error_description = "Hmmmmm... invalid action! (action = '$action'). " . "User has IP : " . $_SERVER['REMOTE_ADDR'] . ".\n";
            $error_handler->record_error($config['THIS_SITE_ID'],
            $config['ERROR_SEVERITY_SECURITY'], FILE, LINE, $error_description);
        }
    $action = 'home';
}



#if submit asset is pressed - for borrowing object uploader
# must add extra feat. price, SDK (if it has more than 1 pieces of that object)
/*
if($action == 'add_asset'){

  $Sanitation = new Sanitation();

  $file_name = $Sanitation->remove_html($_REQUEST['file_name']);
  $description = $Sanitation->remove_html($_REQUEST['description']);

  $target_dir = $config['TMP_DIR'];
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  // Set a upload param in order to proceed with upload
  $uploadOk = true;
  // Get the file type
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  list($width, $height) = getimagesize($_FILES["file"]["tmp_name"]);

  # FILE, CONDITIONS FOR UPLOAD
  // Check if image file is a actual image or fake image
  if($check !== false)
  {
      $uploadOk = true;
  } else {
      $errors[] = "File is not an image.";
      $uploadOk = false;
  }

  if ($_FILES["file"]["size"] > $config['MAX_UPLOAD_SIZE'])
  {
      $errors[] = "Sorry, your file is too large.";
      $uploadOk = false;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
  {
      $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = false;
  }

  #Check if File Name is bigger than 5 char
  if(strlen($file_name) < $config['MIN_NO_OF_CHAR'] )
  {
      $is_message_too_short = 'Your file name is too short (min 5 characters)';
      $errors[] = $is_message_too_short;
  }

  #Check if File Name is bigger than 3 characters
  if(strlen($description) < $config['MIN_NO_OF_CHAR'])
  {
      $is_description_too_short = 'Your description name is way too short (min 3 characters)';
      $errors[] = $is_description_too_short;
  }

  #Check reCAPTCHA
  if (empty($_REQUEST["g-recaptcha-response"]))
  {
      $is_false_recaptcha = "How come you are a robot? It's not fair ..";
      $errors[] = $is_false_recaptcha;
  }

  #if there ar no errors than upload
  if(!$errors)
  {
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == false)
    {
        $errors[]= "Sorry, your file was not uploaded.";
    }
    // if everything is ok, try to upload file and catch errors in the process
    else
    {

      try
      {
          $asset_obj = new Assets();

          $asset_data['file'] = $_FILES['file'];
          $asset_data['local_file_name'] = md5(time());
          $asset_data['public_name'] = $file_name;
          $asset_data['file_description'] = $description;
          $asset_data['file_type'] = 'image';
          $asset_data['image_width'] = $width;
          $asset_data['image_height'] = $height;
          $asset_data['file_extension'] = $imageFileType;

          #add to database
          $asset_obj->add_asset($asset_data);

          #show if successfully uploaded file
          $errors[] = "<p class='btn btn-success'>The file ". $asset_data['public_name']. "." . $asset_data['file_extension'] ." has been uploaded.</p>";
          $errors[] = "<p class='btn btn-success'>Wait for the file to be moderated!</p>";

      }
      catch (Exception $e)
      {
          $errors[] = $e->getMessage();
      }

    }

  }
  else
  {

        $smarty->assign('file_name', $file_name);
        $smarty->assign('description', $description);
  }

}

$assets_obj = new Assets();
$assets_array = $assets_obj->fetch_assets();
$smarty->assign('assets_array', $assets_array);
$smarty->assign('errors', $errors);
*/
$smarty->assign('action', $action);

#show images
if($action == 'home'){

$smarty->display('index.tpl');

}

if($action == 'products'){

$smarty->display('products.tpl');

}

if($action == 'about'){

$smarty->display('about.tpl');

}
