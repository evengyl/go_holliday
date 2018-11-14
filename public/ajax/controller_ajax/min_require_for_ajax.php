<?

include $_SESSION['base_dir'].'/app/includes/tools.php';
include $_SESSION['base_dir'].'/app/modele/Config.php';
include 'Evengyl/modele/_db_connect.class.php';
include 'Evengyl/core/all_query.php';
include 'Evengyl/core/select.php';

Config::set_config_base();
$_db_connect = new _db_connect();
$sql = new all_query();