<header id="head" class="secondary"></header>

	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Création de compte</h1>
				</header><?
				//veux dire qu'il vient tout juste de créer son compte
				if(isset($_SESSION['error_sign_up']) && $_SESSION['error_sign_up'] === true)
				{?>
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Finalisation de création de compte</h3>
								<p class="text-center text-muted">
									Vous êtes désormais inscrit, Merci de votre confiance !
									<br>Vous pouvez désormais vous <a href="/login">connecter ici</a>.
								</p>
								<hr>
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']);
				}
				else
				{?>
								
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Création de votre compte</h3>
								<p class="text-center text-muted">
									Votre compte client vous permet de gérer toute vos informations pour vous faciliter la vie
									<br>Si vous avez déjà un login <a href="/login">connectez-vous ici</a>.
								</p>
								<hr><?
								if(isset($_SESSION['error_sign_up']))
								{?>
									<p class="text-center text-danger">
										<?= $_SESSION['error_sign_up'] ?>
									</p>
									<hr><?
								}?>
								<form action="#" method="post">
									<div class="top-margin">
										<label>Pseudo<span class="text-danger">*</span></label>
										<input name="pseudo" type="text" required autofocus placeholder="Pseudo" class="form-control">
									</div>
									<div class="top-margin">
										<label>Mot de passe (6 caractères minimum)<span class="text-danger">*</span></label>
										<input type="password" name="password-1" required placeholder="Mot de passe" class="form-control">
									</div>
									<div class="top-margin">
										<label>Vérification du Mot de passe<span class="text-danger">*</span></label>
										<input type="password" name="password-2" required placeholder="Vérification du Mot de passe" class="form-control">
									</div>
									<div class="top-margin">
										<label>Adresse Email<span class="text-danger">*</span></label>
										<input name="email" type="email" required autofocus placeholder="Adresse Email (pas de pub)" class="form-control">
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-5 text-right">
											<input type="hidden" name="sign_up">
											<button class="btn btn-action" type="submit">S'inscrire</button>
										</div>
										</div>
								</form>
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']); // permet de ne pas afficher les erreurs de connection si on reload la page
				}?>

		</article>
	</div>
</div>
