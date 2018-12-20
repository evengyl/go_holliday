<? session_start();?>
<!DOCTYPE html>
<?

$_SESSION["base_dir"] = dirname(dirname(__FILE__));

//require de base avec les fonciton diverse et le loader, la fonction microtime est la uniquement pour le temps d'execution des requete pour optimiser
require $_SESSION["base_dir"]."/app/includes/app_min_load.php";


//mise en route de la session
if(!isset($_GET['page']))
	$_GET['page'] = 'home';


ob_start();?>
	<html lang="Fr-be">
		<head>
			__TPL_top_head__
		</head>
		<body class="home">
			__MOD_header__
			
			<? new router($_GET, $_app); ?>
			__MOD_footer__
		</body>
		__TPL2_bottom_head__
	</html><?

$page = ob_get_clean();
//appel le parseur qui rendra tout les modules et tout les vues
$start = $_app->microtime_float();
 //contiendra tout les modules de l'applications appelé sur la page. apres execution de celui ci, il est placé dans l'app.

$page = $parser->parser_main($page);

$parser_translate = new parser_translate($_app, $page);
$page = $parser_translate->page;


echo $page; 

$_app->admin_tools();

affiche_pre($_app);

