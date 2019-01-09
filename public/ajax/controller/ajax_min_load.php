<?
$base_dir = dirname(dirname(dirname(dirname(__FILE__))));

require $base_dir.'/app/includes/_app.php';
require $base_dir.'/app/includes/tools.php';
require $base_dir.'/app/includes/lang_select.php';
require $base_dir.'/app/modele/Config.php';
require 'Evengyl/modele/_db_connect.class.php';
require 'Evengyl/core/all_query.php';
require 'Evengyl/core/select.php';

//mise en route du systeme des query
$_app = new _app();

$_app->sql = new all_query($_app);
