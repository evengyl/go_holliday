<div class="option_account">
    <h4 class="title">Option(s) de compte</h4><hr>

    <h5 class="sub_title">Partie personnelle</h5>

    <div class="edit_profil">
        <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#form_profil"><i class="far fa-address-book"></i>&nbsp;Modification de votre profil</button>
    </div><?

        if($_app->can_do_user->edit_preference)
        {?>
             <div class="edit_profil">
                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#form_prefe"><i class="fas fa-home"></i>&nbsp;Vos préférences</button>
            </div><?
        }?>

    <div class="change_password">
        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#change_password"><i class="fas fa-unlock-alt"></i>&nbsp;Changer de mot de passe</button>
    </div>
    <hr>

    <?
    if($_app->can_do_user->view_infos_annonce)
    {?>
        <h5 class="sub_title">Partie Annonces</h5>

        <div class="add_annonces">
            <a class="btn btn-xs btn-warning" <?= (!$_app->can_do_user->create_annonce)?"disabled":""; ?> href="/Mon_compte/Creation-Annonce"><i class="far fa-edit"></i>&nbsp;Ajouter une annonce</a>
        </div>

        <div class="view_annonces">
            <a class="btn btn-xs btn-success" <?= (!$_app->can_do_user->view_infos_annonce)?"disabled":""; ?> href="/Mon_compte"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Voir mes annonces</a>
        </div>
        <hr><?
    }?>

    <div class="view_annonces">
        <a class="btn btn-xs btn-success" href="/Mon_compte"><i class="far fa-address-card"></i>&nbsp;Retour à Mon compte</a>
    </div>

    <div class="view_annonces">
        <a class="btn btn-xs btn-info" href="/Mon_compte/Messages"><span class="glyphicon glyphicon-comment"></span>&nbsp;Ma messagerie</a>
    </div>

    <div class="view_annonces">
        <a class="btn btn-xs btn-info" href="/Mon_compte/Mes_favoris"><i class="far fa-heart"></i>&nbsp;Mes annonces favorites</a>
    </div>

    <div class="view_annonces">
        <a class="btn btn-xs" href="/Mon_compte">Voir les conditions général</a>
    </div>
</div>
    
<!-- Modal Lost login-->
<? require($_app->base_dir.'/vues/modal_lost_password.php'); ?>


__MOD2_my_account_form_profil__

__MOD2_my_account_edit_preference__

<? unset($_SESSION['error_change_password']); ?>