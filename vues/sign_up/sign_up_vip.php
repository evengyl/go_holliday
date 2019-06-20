<header id="head" class="secondary"></header>

	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Création d'un compte Annonceur</h1>
				</header><?
				
				//veux dire qu'il vient tout juste de créer son compte
				if($_SESSION['just_sign_up'] == true)
					include("sign_up_confirm.php");

				if($_SESSION['just_sign_up'] == false)
				{?>
								
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Création de votre compte Annonceur de locations</h3>
								<p class="text-center text-muted">
									Votre compte client vous permet de gérer vos annonces de locations ect...
									<br>Si vous avez déjà un login <a href="/Connection"><b>connectez-vous ici</b></a>.
								</p>
								<hr>
								<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
									<?= $_app->site_name; ?>, est actuellement gratuit.
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
