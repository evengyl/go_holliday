<?
if(!Config::$is_connect) //donc il est connecté
{
//si la personne a déjà tenter une connexion, sont pseudo qu'il à déjà entré vas se remettre dans le input
	if(isset($_SESSION['first_try_pseudo']))
		$first_try_pseudo = $_SESSION['first_try_pseudo'];
	else
		$first_try_pseudo = "";
	?>
	<div class="secondary" id="head"></div>
	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connexion à votre compte</h3>
							<p class="text-center text-muted">
								<b>Si vous ne possédez pas de compte c'est par ici</b>
								<a href="/Inscription"><b>S'enregistrer</b></a>.
							</p>
							<hr>
							<p class="text-center text-danger">
								<b><?= (isset($error))?$error:''; ?></b>
							</p>
							<form action="#" method="post">
								<div class="top-margin">
									<label>Pseudo<span class="text-danger">*</span></label>
									<input name="pseudo" type="text" required autofocus value="<?=(isset($_POST['pseudo']))?$_POST['pseudo']:''; ?><?= $first_try_pseudo ?>" placeholder="Pseudo" class="form-control">
								</div>
								<div class="top-margin">
									<label>Mot de passe<span class="text-danger">*</span></label>
									<input type="password" name="password" required placeholder="Mot de passe" class="form-control">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-7">
										<b><a style="cursor: pointer;" data-toggle="modal" data-target="#lost_login_modal">Mot de passe oublié ?</a></b>
									</div>
									<div class="col-lg-5 text-right">
										<input type="hidden" name="connect_form">
										<button class="btn btn-action" type="submit">Se connecter</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div><?
}
else
{
	header('Location: /Mon_compte');


	/*?>	
	<div class="secondary" id="head"></div>
	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Vous êtes maintenant connecté</h3>
							<p class="text-center text-muted">
								Vous êtes connecté en tant que <b><?= ucfirst($_SESSION['pseudo']) ?></b><br>
								Si vous voulez vous déconnecter c'est par ici
								<a href="/Deconnexion">Se déconnecter</a>.
							</p>
							<hr>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div><?*/
}

include("modal_recorvery_password.php");

unset($_SESSION['error_login']); // permet de ne pas afficher les erreurs de connection si on reload la page
