<?
session_start();


$base_dir = dirname(dirname(dirname(dirname(__FILE__))));


require $base_dir.'/app/modele/Config.php';

require 'Evengyl/modele/_db_connect.class.php';
require 'Evengyl/core/all_query.php';
require 'Evengyl/core/select.php';
require 'Evengyl/core/var_processing.php';
require 'Evengyl/core/parse_table_jointure.php';
require 'Evengyl/core/where.php';
require 'Evengyl/core/order_processing.php';
require 'Evengyl/core/limit_processing.php';
require 'Evengyl/core/ManyToManyType.php';
require 'Evengyl/core/OneToOneType.php';
require 'Evengyl/core/OneToManyType.php';
require 'Evengyl/core/NormalType.php';

$directory = $base_dir.'/app/model_table/';
if( is_dir($directory) ){
	$dossier = opendir($directory);
	while($fichier = readdir($dossier)){
		if(is_file($directory.'/'.$fichier) && $fichier !='/' && $fichier !='.' && $fichier != '..' && strtolower(substr($fichier,-4))==".php"){
			require_once($directory.'/'.$fichier);
		}
	}
	closedir($dossier);
}


require $base_dir.'/app/includes/fct_global_website.php';
require $base_dir.'/app/includes/fct_global_annonce.php';
require $base_dir.'/app/includes/fct_global_account.php';
require $base_dir.'/app/includes/_app.php';
require $base_dir.'/app/includes/can_do_user.php';



//mise en route du systeme des query
$_app = new _app();
$_app->base_dir = $base_dir;
$_app->sql = new all_query($_app);


$_app->set_user_infos_on_app();

$_app->can_do_user = new can_do_user($_app);


if(isset($_SESSION['user_type']))
	$_app->user->user_type = $_SESSION['user_type'];
else
	$_app->user->user_type = 1;
