<?php
require(dirname(dirname(dirname(__FILE__))) . '/inc/config.php');

// Remove this in production!
ini_set("display_errors", 1);
error_reporting(E_ALL ^ E_NOTICE);

$config['FILE_MAX_FILE_SIZE'] = '20000';// 1 Mb

$tpl_folder = $config['BASE_DIR'] . '/tpl/admin-1000';
$tpl_folder_root = $config['BASE_DIR'] . '/tpl';
$tpl_folder_admin =  $config['BASE_DIR'] . '/tpl/admin-1000';

$root_url_admin = $config['BASE_URL'].'/admin-1000';

$config['IMAGES_PATH_DIR'] = $config['BASE_URL'].'/img'; 
$config['ASSETS_PATH_DIR'] = $config['BASE_DIR'].'/assets';

$config['ASSETS_PATH_URL'] = $config['BASE_URL'].'/assets';
//form input lengths
$config['CT_USERNAME_MAX_LENGTH'] = 30; 
$config['CT_USERGROUP_MAX_LENGTH'] = 30; 
$config['CT_USERGROUP_DESCRIPTION_MAX_LENGTH'] = 200; 
/*Paginations constants*/
$config['CT_NUMBER_OF_ARTICLES_PER_PAGE'] = 5; // rows per page
$config['CT_NUMBER_OF_ASSETS_PER_PAGE'] = 5; // rows per page
$config['CT_NUMBER_OF_EMAILS_PER_PAGE'] = 10; // rows per page
$config['CT_NUMBER_OF_USERS_PER_PAGE'] = 5; // rows per page
$config['CT_NUMBER_OF_USERGROUPS_PER_PAGE'] = 5; // rows per page
$config['CT_NUMBER_OF_CATEGORIES_PER_PAGE'] = 5; // rows per page
//user group admin id
$config ['CT__ADMIN_USER_GROUP_ID'] = 1;
//iteration number for display order
$config['DISPLAY_ORDER_LIMIT'] = 100;
//LOAD CLASSES
require $config['BASE_DIR'] . '/admin-1000/inc/loginAdmin.class.php';
require $config['BASE_DIR'] . '/admin-1000/inc/Users.class.php';
require $config['BASE_DIR'] . '/admin-1000/inc/actions.class.php';
require $config['BASE_DIR'] . '/inc/FormatDate.class.php';
require $config['BASE_DIR'] . '/inc/Site_settings.class.php';

//pages
$login_url = $root_url . '/?action=login';
$logout_url =  $root_url . '/?action=logout';
$home_url = $root_url . '/';
$admin_login_url =  $root_url_admin.'/?action=admin-login';
$admin_new_user_url = $root_url_admin.'/?action=admin-add_user';
$admin_new_admin_url = $root_url_admin.'/?action=admin-add_admin';
$admin_edit_user_url = $root_url_admin.'/?action=admin-edit_user';
$admin_users_url = $root_url_admin.'/?action=admin-users';
$admin_users_logout_url = $root_url_admin.'/?action=admin-logout';
$admin_edit_user_url = $root_url_admin.'/?action=admin-edit_user';
$admin_edit_admin_url = $root_url_admin.'/?action=admin-edit_admin';
$admin_users_front_url = $root_url_admin.'/?action=admin-front-users';
$admin_errors_url = $root_url_admin.'/?action=admin-errors';
$admin_articles_url = $root_url_admin.'/?action=admin-articles';
$admin_articles_add_url = $root_url_admin.'/?action=admin-articles-add';
$admin_articles_edit_url = $root_url_admin.'/?action=admin-articles-edit';
$admin_articles_delete_url = $root_url_admin.'/?action=admin-articles-delete';
$admin_assets_url = $root_url_admin.'/?action=admin-assets';
$admin_assets_add_url = $root_url_admin.'/?action=admin-assets-add';
$admin_assets_edit_url = $root_url_admin.'/?action=admin-assets-edit';
$admin_assets_delete_url = $root_url_admin.'/?action=admin-assets-delete';
$admin_categories_url = $root_url_admin.'/?action=admin-categories';
$admin_comments_unmoderated_url = $root_url_admin.'/?action=admin-comments_unmoderated';
$admin_comments_all_url = $root_url_admin.'/?action=admin-comments';
$admin_emails_management_url = $root_url_admin.'/?action=admin-emails_management';
$admin_settings_url = $root_url_admin.'/?action=admin-settings';
$admin_actions_url = $root_url_admin.'/?action=admin-actions';
$admin_usergroup_url = $root_url_admin.'/?action=admin-usergroup';
$admin_usergroup_actions_url = $root_url_admin.'/?action=admin-usergroup-actions';
$admin_add_usergroup_url = $root_url_admin.'/?action=admin-add-usergroup';
$browse_assets_list_url = $root_url_admin.'/browse.php?type=images&source=non_ckeditor&input_file_url=social_media_image';
$browse_assets_list_ckeditor_url = $root_url_admin.'/browse.php?type=images&source=ckeditor&CKEditorFuncNum=1';
//Admin section
$smarty->assign('tpl_folder_root', $tpl_folder_root);
$smarty->assign('tpl_folder', $tpl_folder);
$smarty->assign("root_url_admin", $root_url_admin);
$smarty->assign('admin_login_url',$admin_login_url );
$smarty->assign('admin_new_user_url',$admin_new_user_url );
$smarty->assign('admin_edit_user_url',$admin_edit_user_url );
$smarty->assign('admin_new_admin_url',$admin_new_admin_url );
$smarty->assign('admin_edit_admin_url',$admin_edit_admin_url );
$smarty->assign('admin_users_url',$admin_users_url );
$smarty->assign('admin_users_logout_url',$admin_users_logout_url );
$smarty->assign('admin_users_front_url',$admin_users_front_url );
$smarty->assign('admin_errors_url',$admin_errors_url );
$smarty->assign('admin_edit_user_url',$admin_edit_user_url );
$smarty->assign('admin_edit_admin_url',$admin_edit_admin_url );
$smarty->assign('admin_articles_url',$admin_articles_url );
$smarty->assign('admin_articles_add_url',$admin_articles_add_url );
$smarty->assign('admin_articles_edit_url',$admin_articles_edit_url );
$smarty->assign('admin_articles_delete_url',$admin_articles_delete_url );
$smarty->assign('admin_assets_url',$admin_assets_url );
$smarty->assign('admin_assets_add_url',$admin_assets_add_url );
$smarty->assign('admin_assets_edit_url',$admin_assets_edit_url );
$smarty->assign('admin_assets_delete_url',$admin_assets_delete_url );
$smarty->assign('assets_path_dir',$config['ASSETS_PATH_DIR'] );
$smarty->assign('assets_path_url',$config['ASSETS_PATH_URL'] );
$smarty->assign('images_path_dir',$config['IMAGES_PATH_DIR'] );
$smarty->assign('admin_categories_url',$admin_categories_url );
$smarty->assign('admin_comments_unmoderated_url',$admin_comments_unmoderated_url );
$smarty->assign('admin_comments_all_url',$admin_comments_all_url );
$smarty->assign('admin_emails_management_url',$admin_emails_management_url );
$smarty->assign('admin_settings_url',$admin_settings_url );
$smarty->assign('admin_actions_url',$admin_actions_url );
$smarty->assign('admin_usergroup_url',$admin_usergroup_url );
$smarty->assign('admin_add_usergroup_url',$admin_add_usergroup_url );
$smarty->assign('admin_usergroup_actions_url',$admin_usergroup_actions_url );
$smarty->assign('browse_assets_list_url',$browse_assets_list_url );
$smarty->assign('browse_assets_list_ckeditor_url',$browse_assets_list_ckeditor_url );
//parse the form limits
$smarty->assign('username_max_length',$config['CT_USERNAME_MAX_LENGTH'] );
$smarty->assign('usergroup_max_length',$config['CT_USERGROUP_MAX_LENGTH'] );
$smarty->assign('usergroup_description_max_length',$config['CT_USERGROUP_DESCRIPTION_MAX_LENGTH'] );

