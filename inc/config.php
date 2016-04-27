<?php
// Remove this in production!
ini_set("display_errors", 1);
error_reporting(E_ALL ^ E_NOTICE);

date_default_timezone_set('Europe/Bucharest');

# CONFIG - first look here
$config = array();
$config['DEBUG'] = true;

// Config for folders
$config['BASE_DIR'] = '/var/www/akiva/';
$config['LIB_DIR'] = '/var/www/lib/';
$config['BASE_URL'] = 'http://akiva.linuxserv.space';
$config['ASSETS_DIR'] = $config['BASE_DIR'] . 'assets';
$config['MAX_UPLOAD_SIZE'] = 1000000; //1mb
$config['MIN_NO_OF_CHAR'] = 5;
$config['TMP_DIR'] = $config['BASE_DIR'] . '/tmp/';


require $config['BASE_DIR'] .'/inc/ErrorHandler.php';
//smarty start
require_once($config['LIB_DIR'] . '/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $config['BASE_DIR'] . '/tpl';
$smarty->compile_dir  = $config['BASE_DIR'] . '/tpl_c';

$smarty->setCacheDir($config['BASE_DIR'].'/cache');
$smarty->caching = 0;
$smarty->force_compile = true;

//bcrypt
require $config['BASE_DIR'] . '/inc/bcrypt.class.php';

//htmlpurifier
require($config['LIB_DIR'].'/htmlpurifier/library/HTMLPurifier.includes.php');
$html_purifier_config = HTMLPurifier_Config::createDefault();
$html_purifier_config->set('Core.Encoding', "UTF-8"); // not using UTF-8
$html_purifier_config->set('HTML.AllowedAttributes', array('a.target', 'a.href', 'img'));
$html_purifier_config->set('Attr.AllowedFrameTargets', array('_blank'));
$purifier = new HTMLPurifier($html_purifier_config);

// Database config + Innitialize ADODB;;
require $config['LIB_DIR'] . '/adodb5/adodb-errorhandler.inc.php'; //adodbe error-handler
require $config['LIB_DIR'] . '/adodb5/adodb.inc.php';
$db_connection = NewADOConnection('mysqli');
$db_connection->Connect('localhost','root','T-Rad1','akiva');

$smarty->assign('base_url', $config['BASE_URL']);
$smarty->assign("root_url", $config['BASE_URL']);
$root_url = $config['BASE_URL'];

$smarty->assign("tpl_folder",  $config['BASE_DIR'] . 'tpl');
$smarty->assign("ASSETS_PATH_DIR",  $config['ASSETS_DIR']);


//LOAD CLASSES

require $config['BASE_DIR'] . '/inc/Assets.class.php';
require $config['BASE_DIR'] . '/inc/Sanitation.class.php';


require $config['BASE_DIR'] . '/inc/emails_management.class.php';
require $config['BASE_DIR'] . '/inc/Settings.class.php';

$Settings = new Settings();
$where = array();
$allSettings = $Settings -> fetch_settings(false, false,'setting_name','asc', implode(' ', $where));

if (!empty($allSettings))
{
    foreach ($allSettings as $key => $setting)
    {
        $config[$setting['setting_name']] = $setting['setting_value'];
    }
}

//load google api

if(isset($config['google_api'])){
  $google_api_root = 'https://maps.googleapis.com/maps/api/js?key='. $config['google_api'].'&callback=initMap';
  $smarty->assign('google_api_root', $google_api_root);
  $lat = $config['latitude'];
  $lng =  $config['longitude'];
  $smarty->assign('lng', $lng);
  $smarty->assign('lat', $lat);
}



//captcha keys
$config['reCaptcha_secretkey'] = (!isset($config['reCaptcha_secretkey']))? '6LeokhsTAAAAAGj28qoJIsrgxHFGXKHVFiwdXrb5' : $config['reCaptcha_secretkey'];
$config['reCaptcha_sitekey'] = (!isset($config['reCaptcha_sitekey']))? '6LeokhsTAAAAAOIIqyRfmwD20hYuZh8TybU9UaHO': $config['reCaptcha_sitekey'];
$secretkey = $config['reCaptcha_secretkey'];
$sitekey = $config['reCaptcha_sitekey'];

$smarty->assign('sitekey', $sitekey);
$smarty->assign('secretkey', $secretkey);


$config['SITE_NAME'] = (!isset($config['SITE_NAME']))? 'Default Site': $config['SITE_NAME'];
#$config['SITE_LOGO'] = $config['BASE_URL'] . '/img/UploadDataQ.png';
$config['SITE_LOGO'] = (!isset($config['SITE_LOGO']))? '  ' : "<img src='".$config['SITE_LOGO']."' width='80' alt='Logo' />";

$page_title = (!isset($config['SITE_NAME']))? 'Upload Image': $config['SITE_NAME'];

$smarty->assign('site_name', $config['SITE_NAME']);
$smarty->assign('site_logo', $config['SITE_LOGO']);

# ========== Changes ==================
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 10);// 10 days cookie lifetime
session_start();

# ========== LOGIN / LOGOUT ===========

$login_url = $root_url . '/login/';
$logout_url =  $root_url . '/?action=logout';
$home_url = $root_url . '/';

$tpl_folder_admin = $config['BASE_DIR'].'/tpl/admin-1000';
//pages
$smarty->assign('root_url', $root_url);
$smarty->assign('login_url', $login_url);
$smarty->assign('logout_url', $logout_url);
$smarty->assign('home_url', $home_url);
$smarty->assign('page_title', $page_title);
$smarty->assign('tpl_folder_admin', $tpl_folder_admin);

$tpl_folder = $config['BASE_DIR'] . '/tpl';
$smarty->assign('tpl_folder', $tpl_folder);