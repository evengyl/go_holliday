<header id="head" class="secondary"></header>
<div class="container text-center">
	<br> <br>
	<h2 class="thin">Administration des option de l'APP</h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-without-padding col-without-radius">
			<div class="col-xs-6 col-xs-offset-3">
				<a href="/admin/eval" type="button" class="btn btn-primary btn-lg btn-block">EVAL</a>
				<a href="/admin/edit_config_app" type="button" class="btn btn-primary btn-lg btn-block">Edit option _APP</a>
				<a href="/admin/pull_bsd" type="button" class="btn btn-primary btn-lg btn-block">Pull BSD</a>
				<a href="/admin/go_to_client_view" type="button" class="btn btn-info btn-lg btn-block">Passer en vue Client simple</a><?
				if($_app->user->user_type == 1 || $_app->user->user_type == 0)
				{?>
					<a href="/admin/go_to_vip_view" type="button" class="btn btn-success btn-lg btn-block">Passer en vues VIP</a><?
				}
				else if($_app->user->user_type == 2 || $_app->user->user_type == 0)
				{?>
					<a href="/admin/go_to_no_vip_view" type="button" class="btn btn-success btn-lg btn-block">Passer en vues Non VIP</a><?
				}?>
			</div>
		</div>
	</div>
</div>


<div class="container text-center">
	<br> <br>
	<h2 class="thin">Administration à mettre dans le CRON !!</h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-without-padding col-without-radius">
			<div class="col-xs-6 col-xs-offset-3">
				<a href="/admin/verify_status_vip" type="button" class="btn btn-danger btn-lg btn-block">Vérifier les status VIP pour désactiver les annonces.</a>
			</div>
		</div>
	</div>
</div>