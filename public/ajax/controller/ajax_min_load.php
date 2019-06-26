<?
session_start();


$base_dir = dirname(dirname(dirname(dirname(__FILE__))));

require $base_dir.'/app/includes/_app.php';
require $base_dir.'/app/includes/can_do_user.php';
require $base_dir.'/app/includes/tools.php';
require $base_dir.'/app/includes/lang_select.php';
require $base_dir.'/app/modele/Config.php';

require 'Evengyl/modele/_db_connect.class.php';
require 'Evengyl/core/all_query.php';
require 'Evengyl/core/select.php';
require 'Evengyl/core/var_processing.php';
require 'Evengyl/core/parse_table_jointure.php';
require 'Evengyl/core/where.php';
require 'Evengyl/core/order_processing.php';
require 'Evengyl/core/limit_processing.php';



//mise en route du systeme des query
$_app = new _app();



$_app->user = new stdClass();

if(isset($_SESSION['user_type']))
	$_app->user->user_type = $_SESSION['user_type'];
else
	$_app->user->user_type = 1;

$_app->can_do_user = new can_do_user($_app);

$_app->sql = new all_query($_app);

