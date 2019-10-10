<div class="secondary" id="head"></div>
<div class="col-xs-12 text-center">
    <h2 class="thin">Dashboard ADMIN</h2>
</div>

<div class="col-xs-2" style="min-height: 1200px;">
    <div class="profil">
        <div class="back_profil">
            <img class="img-responsive" src="/images/background_profil/<?= $_app->user->id_background_profil; ?>.jpg" alt="..."/>
        </div>

		<a style="margin-top:10px;" href="/admin/edit_config_app" type="button" class="btn btn-success  btn-block">Edit option _APP</a>
		<a style="margin-top:10px;" href="/admin/pull_bsd" type="button" class="btn btn-danger  btn-block">Pull BSD (attention)</a>
		<a style="margin-top:10px;" href="/admin/stat_view" type="button" class="btn btn-warning  btn-block">Voir les statistiquesde vues</a>
		<a style="margin-top:10px;" href="/admin/client_list" type="button" class="btn btn-info  btn-block">Listes des clients</a>
		<a style="margin-top:10px;" href="/admin/annonceur_list" type="button" class="btn btn-info  btn-block">Listes des annonceurs</a>
		<a style="margin-top:10px;" href="/admin/annonce_wait_validate_admin" type="button" class="btn btn-success  btn-block">Liste des annonces<br> en attente de validation admin</a>
	</div>
</div>

