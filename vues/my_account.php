<header id="head" class="secondary"></header>
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
                __MOD3_view_lateral_profil__
            </div>
        </div>

         <!-- Modal changement de back profil -->
<div class="modal fade" id="change_back_profil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Changement du fond d'écran du profil</h4>
                <p class="text-muted">Cliquez sur le nouveau fond pour l'activer</p>
            </div>
            <div class="modal-body" style="height:540px;"><?
                foreach($img_back_profil as $row_img)
                {?>
                    <form method="POST" action="#">
                        <div class="col-xs-4" style="height:130px;">
                            <input type="hidden" name="id_img_selected" value="<?= $row_img ?>">
                            <button type="submit" class="thumbnail">
                                <img src='/images/background_profil/<?= $row_img ?>.jpg' class='img-responsive img_modal_back_profil'>
                            </button>
                        </div>
                    </form><?
                }?>
            </div>
        </div>
    </div>
</div>

        <div class="col-lg-7 row">
		    <div class="col-lg-12 annonces_list">
				<? require ($_app->base_dir.'/vues/list_annonces_annonceurs.php'); ?>
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

                <h5 class="sub_title">Partie Annonces</h5>
	        	<div class="add_annonces">
	        		<button class="btn btn-warning" <?= (!$_app->can_do_user->edit_preference)?"create_annonce":""; ?> data-toggle="modal" data-target="#tata">Ajouter une annonce</button>
	        	</div>
                <hr>
        	</div>
        </div>

    </div>
</div>



	<!-- Modal Lost login-->
<? require("modal_lost_password.php"); ?>
<? require("modal_my_preferences.php"); ?>

__MOD2_form_profil__


        
<? unset($_SESSION['error_change_password']); ?>