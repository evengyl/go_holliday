<header id="head" class="secondary"></header>

	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Création d'un compte Client</h1>
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
									<br>Vous pouvez désormais vous <a href="/Connection">Connecter ici</a>.
								</p>
								<hr>
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']);
				}
				else
				{?>
								
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Création de votre compte Client</h3>
								<p class="text-center text-muted">
									Votre compte client vous permet de trouver des vacances et des les gérers
									<br>Si vous avez déjà un login <a href="/Connection"><b>connectez-vous ici</b></a>.
								</p>
								<hr><?
								if(isset($_SESSION['error_sign_up']))
								{?>
									<p class="text-center text-danger">
										<?= $_SESSION['error_sign_up'] ?>
									</p>
									<hr><?
								}
								
								include("sign_up_form.php");?>
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']); // permet de ne pas afficher les erreurs de connection si on reload la page
				}?>

		</article>
	</div>
</div>



<? require($_app->base_dir."/vues/modal_website_rules.php"); ?>
