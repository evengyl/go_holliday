<header id="head" class="secondary"></header>
<div class="container">
	<div class="row">
		<article class="col-sm-9 maincontent">
			<header class="page-header">
				<h1 class="page-title">__TRANS_contact_us__</h1>
			</header>
			<form action="#" method="post" >
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<input class="form-control" name="name" type="text" required value="<?=(isset($_app->user->name)?$_app->user->name:'') ?>" placeholder="Votre Nom et/ou Prénom">
					</div>
					<div class="col-xs-12 col-sm-4">
						<input class="form-control" name="email" type="email" required value="<?=(isset($_app->user->email)?$_app->user->email:'') ?>" placeholder="Adresse Email">
					</div>
					<div class="col-xs-12 col-sm-4">
						<input class="form-control" name="phone" type="text" value="<?=(isset($_app->user->tel)?$_app->user->tel:'') ?>"  Reqired placeholder="Téléphone (pas de pub)">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<textarea placeholder="Votre message / demande" required name="text" type="text" class="form-control" rows="9"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 text-right">
						<input type="hidden" name="return_post_contact" value="1">
						<input class="btn btn-action" type="submit" value="__TRANS_envoyer__">
					</div>
				</div>
			</form>

		</article>

		<aside class="col-xs-12 col-sm-3 sidebar sidebar-right">
			<div class="widget">
				<h4>__TRANS__contact_detail__</h4>
				<address>
					<a href="mailto:perroquet484@matedex.be"><?= Config::$mail; ?></a><br>
					<br>
					<p class="text-muted">La page de contact est fait pour vous permettre de contacter le services clients et maintenances de <?= $_app->site_name; ?></p>
					<hr>
					<p class="text-muted">Pour toutes question relative à une publications d'annonces ou un prix ou même un soucis avec une annonces en générale, préféré d'abbord passer par le service qu'il vous est fourni sur l'annonce, ce qui contact directement par message le propriétaire de l'annonce</p>
					<hr>
				</address>
			</div>
		</aside>
	</div>
</div>

