<header id="head" style="background:#181015 url(<?= $slides; ?>) no-repeat center; margin-left:-15px; margin-right:-15px;">
	<div class="container">
		<div class="row">
			<h1 class="lead">Bienvenue sur <?= $_app->site_name; ?></h1>
			<p class="tagline"><span style="background: #0007; padding: 4px;">&nbsp;&nbsp;&nbsp;Votre site de recherche gratuit pour trouver vos vacances selon VOS envies !&nbsp;&nbsp;&nbsp;</span></p>
			<p><a class="btn btn-default btn-lg" href="/Recherche" style="color:white; background:#0006;" role="button">Chercher ce dont vous rêvez</a></p><?
			if($_app->option_app['app_with_login_option'])
			{
				if(!Config::$is_connect)
					echo '<p><a class="btn btn-action btn-lg" href="/Inscription" role="button">Vous inscrire</a></p>';
			}?>
		</div>
	</div>
</header>

<div class="container text-center">
	<br><br>
	<h2 class="thin">Nous réalisons vos envies de vacances simple et directement en ligne</h2>
	
	<h3>La différence entre nous et d'autre site de vacances est que nous ne travaillons qu'avec des privés qui possède un bien secondaire de type vacancier</h3>
</div>

__MOD2_search_type__

__MOD_reason_why__

__MOD_faq__