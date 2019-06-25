<div class="col-xs-12 text-center">
    <h2 class="thin">Administration</h2>
    <p class="text-muted thin">Liste des function a mettre dans le cron : <br>purge des user vip, 1 fois par jour à minuit</p>
</div>

<div class="col-xs-3">
    <div class="profil">
        <div class="back_profil">
            <img class="img-responsive" src="/images/background_profil/<?= $_app->user->id_background_profil; ?>.jpg" alt="..."/>
        </div>
	</div>


	<div class="col-xs-12 profil col-without-radius" style="padding:15px;">
		<a href="/admin/eval" type="button" class="btn btn-primary  btn-block">EVAL</a>
		<a href="/admin/edit_config_app" type="button" class="btn btn-primary  btn-block">Edit option _APP</a>
		<a href="/admin/pull_bsd" type="button" class="btn btn-primary  btn-block">Pull BSD</a>
		<a href="/admin/go_to_client_view" type="button" class="btn btn-info  btn-block">Passer en vue Client simple</a><?
		if($_app->user->user_type == 1 || $_app->user->user_type == 0)
		{?>
			<a href="/admin/go_to_vip_view" type="button" class="btn btn-success  btn-block">Passer en vues VIP</a><?
		}
		else if($_app->user->user_type == 2 || $_app->user->user_type == 0)
		{?>
			<a href="/admin/go_to_no_vip_view" type="button" class="btn btn-success  btn-block">Passer en vues Non VIP</a><?
		}?>
		<a class="btn btn-danger  btn-block" href="/Deconnection">Se déconnecter du mode Admin</a>
	</div>
</div>


