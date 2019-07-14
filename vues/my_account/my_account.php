<div class="secondary" id="head"></div>
<div class="container-fluid text-center" style="background-color: #f2f2f2;">
    <div class="row">
        <h2 class="thin">Mon compte</h2>
        <?=(isset($_SESSION['error_change_password']))?"<h4 style='color:red;' class='title'>" . $_SESSION['error_change_password'] . "</h4><hr>":""; ?>
    </div>
    <div class="row page-profil">
        <div class="col-lg-3">
            <div class="profil">
                <div class="back_profil">
                    <img class="img-responsive" src="/images/background_profil/<?= $_app->user->id_background_profil; ?>.jpg" alt="..."/>
                    <div class="in_top_right"><button data-toggle="modal" data-target="#change_back_profil" class="btn" style=""><i class="fa fa-cog"></i></button></div>
                </div>
                __MOD2_view_lateral_profil__
            </div>
        </div>

        <!-- Modal changement de back profil -->
        <? require($_app->base_dir.'/vues/my_account/my_account_edit_background_profil.php'); ?>

        <div class="col-lg-7 row">
		    <div class="col-lg-12 annonces_list">
				<?
                if(isset($_GET['create_announce'])) 
                    echo "__MOD2_create_announce__";
                else if($_app->can_do_user->view_infos_annonce)
                    require ($_app->base_dir.'/vues/my_account/my_account_list_annonces_annonceurs.php');
                else
                    echo "__MOD2_account_client__";?>
    		</div>
	    </div>


    	<div class="col-lg-2">
        	<div class="option_account">
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

                <?
                if($_app->can_do_user->view_infos_annonce)
                {?>
                    <h5 class="sub_title">Partie Annonces</h5>

                    <div class="add_annonces">
                        <a class="btn btn-warning" <?= (!$_app->can_do_user->create_annonce)?"disabled":""; ?> href="/Mon_compte/Creation-Annonce">Ajouter une annonce</a>
                    </div>

                    <div class="view_annonces">
                        <a class="btn btn-success" <?= (!$_app->can_do_user->view_infos_annonce)?"disabled":""; ?> href="/Mon_compte">Voir mes annonces</a>
                    </div>

                    <hr><?
                }?>
        	</div>
        </div>

    </div>
</div>


	<!-- Modal Lost login-->
<? require($_app->base_dir.'/vues/modal_lost_password.php'); ?>

__MOD2_form_profil__

__MOD2_edit_preference__


        
<? unset($_SESSION['error_change_password']); ?>