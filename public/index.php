<? session_start();?>
<!DOCTYPE html>
<?


$_SESSION["base_dir"] = dirname(dirname(__FILE__));
//require de base avec les fonciton diverse et le loader, la fonction microtime est la uniquement pour le temps d'execution des requete pour optimiser
require dirname(dirname(__FILE__))."/app/includes/app_min_load.php";


//mise en route de la session
if(!isset($_GET['page']))
	$_GET['page'] = 'home';


ob_start();?>
	<html lang="Fr-be">
		<head>
			__MOD_top_head__
		</head>
		<body class="home">
			__MOD_header__
			<div class="container-fluid">
					<? new router($_GET, $_app, $security); ?>
			</div>
			__MOD_footer__
		</body>
		__MOD2_bottom_head__
	</html><?

$page = ob_get_clean();
ob_end_clean();
//appel le parseur qui rendra tous les modules et toutes les vues
//contiendra tout les modules de l'applications appelé sur la page. apres execution de celui ci, il est placé dans l'app.


$start = $_app->microtime_float();
//Permet d'enregistrer le temps d'execution de la page avant le parse main et le mettre dans le App pour optimisation 

$page = $parser->parser_main($page);
//Fonction principale du site parse le contenu total des modules par ordre chrono TPL MOD TPL2 MOD2 TPL3 MOD3

//va parser les translation du site.
$parser_translate = new parser_translate($_app, $page);
echo $parser_translate->page; 

$_app->admin_tools();

affiche($_app);
