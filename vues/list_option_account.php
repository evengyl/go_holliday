<h4 class="title">Option(s) de compte</h4><hr>

<h5 class="sub_title">Partie personnelle</h5>

<div class="edit_profil">
    <button class="btn btn-info" data-toggle="modal" data-target="#form_profil">Modification de votre profil</button>
</div>

<div class="edit_profil">
    <button class="btn btn-info" <?= (!$_app->can_do_user->edit_preference)?"disabled":""; ?> data-toggle="modal" data-target="#form_prefe">Vos préférences</button>
</div>

<div class="change_password">
	<button class="btn btn-danger" data-toggle="modal" data-target="#change_password">Changer de mot de passe</button>
</div>
<hr>

<h5 class="sub_title">Partie Annonces</h5>

<div class="add_annonces">
	<a class="btn btn-warning" <?= (!$_app->can_do_user->create_annonce)?"disabled":""; ?> href="/Mon_compte/creation-annonces">Ajouter une annonce</a>
</div>

<div class="view_annonces">
	<a class="btn btn-success" <?= (!$_app->can_do_user->view_infos_annonce)?"disabled":""; ?> href="/Mon_compte">Voir mes annonces</a>
</div>

<hr>