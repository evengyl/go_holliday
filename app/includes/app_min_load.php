<?
$base_dir = dirname(dirname(dirname(__FILE__)));

//mise en route de l'autoload
require $base_dir."/app/includes/load_class.php"; 
Autoloader::register(); 


//on initialise le app, qui sers d'object général pour l'application
$_app = new _app();
$_app->time_start = $_app->microtime_float();
$_app->base_dir = $base_dir;

require $base_dir."/app/modele/Config.php";


//mise en route du détecteur et assignateur de langue
$lang_select = new lang_select($_app);

//mise en route du systeme des query
$_app->sql = new all_query($_app);


//initialisation de l'app avec mise en route de la base de données si la base viens d'être crée et si il manque des table
new app_init($_app);


//setting parse
$parser = new parser($_app);

//Mise en route de la navigation
$_app->navigation = new navigation($_app);


//va être appeler a chaque démarage de script page et va checker si le user est connecter ou pas.

$security = new security($_app);
$security->check_session(); 

$_app->can_do_user = new can_do_user($_app);



	