<header id="head" class="secondary"></header><?


if(isset($_SESSION['pseudo'])) //donc il est connecté
{?>
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
								Vous êtes connecté en tant que <?= ucfirst($_SESSION['pseudo']) ?><br>
								Si vous voulez vous déconnecter c'est par ici
								<a href="logout">Se déconnecter</a>.
							</p>
							<hr>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div><?
}
else
{
	if(isset($_SESSION['tmp_pseudo']))
		$tmp_pseudo = $_SESSION['tmp_pseudo'];
	else
		$tmp_pseudo = "";
	?>

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
								Si vous ne possédez pas de compte c'est par ici
								<a href="sign_up">S'enregistrer</a>.
							</p>
							<hr>
							<p class="text-center text-danger">
								<?= (isset($_SESSION['error_login']))?$_SESSION['error_login']:''; ?>
							</p>
							<form action="#" method="post">
								<div class="top-margin">
									<label>Pseudo<span class="text-danger">*</span></label>
									<input name="pseudo" type="text" required autofocus value="<?= $tmp_pseudo ?>" placeholder="Pseudo" class="form-control">
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
	unset($_SESSION['error_login']); // permet de ne pas afficher les erreurs de connection si on reload la page
	
}

?>


	<!-- Modal Lost login-->
<div class="modal fade" id="lost_login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Récupération de votre mot de passe</h4>
			</div>
			<div class="modal-body" style="height:180px;">
				<p class="text-center text-muted">Pour récupérer votre mot de passe veuillez entrer votre adresse mail ou votre pseudo,</br>
				nous vous enverrons un Mail contenant votre mot de passe</p>
				<form action="#" method="post">
					<div class="col-xs-12 form-group">
						<input name="pseudo_mail" type="text" class="form-control" required autofocus placeholder="Pseudo / Email">
					</div>
					<input type="hidden" name="lost_login_form">
					<button type="submit" class="col-xs-12 btn btn-action">Récupérer votre mot de passe</button>
				</form>
			</div>
		</div>
	</div>
</div>