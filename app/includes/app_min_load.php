<?
require_once $_SESSION['base_dir']."/app/includes/_app.php";
$_app = new _app();

$_app->time_start = $_app->microtime_float();

require_once $_app->base_path."/app/includes/tools.php";

require_once $_app->base_path."/app/modele/Config.php";

//Chargement de class concernée pour le sql
require_once $_app->base_path."/app/includes/load_class.php"; 

//mise en route de l'autoload
Autoloader::register(); 


//on initialise le app, qui sers d'object général pour l'application

//mise en route du systeme des query
$_app->sql = new all_query($_app);


//initialisation de l'app avec mise en route de la base de données si la base viens d'être crée et si il manque des table
require_once $_app->base_path."/app/includes/app_init.php";
new app_init($_app);


//setting du root_directory
$_app->base_dir = $_app->base_path;

//setting parse
$parser = new parser($_app);



//mise en route du détecteur et assignateur de langue
$lang_select = new lang_select();
if(isset($_GET['lang']) && $_GET["lang"] != "")
	$lang_select->assign_lang($_GET["lang"], $_app);

else if(!isset($_SESSION['lang']) || empty($_SESSION["lang"]))
	$lang_select->auto_detect($_app);




//Mise en route de la navigation
require_once $_app->base_path."/app/includes/navigation.php";
$_app->navigation = new navigation($_app);


//va être appeler a chaque démarage de script page et va checker si le user est connecter ou pas.
new security($_app);
	