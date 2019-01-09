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
        	<!-- Collapse part edit profil -->
			<div class="col-lg-12 profil_infos">
				<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse_profil_infos" aria-expanded="false" aria-controls="collapseExample">
					<i class="fas fa-caret-down "></i>&nbsp;&nbsp;Modification de votre profil&nbsp;&nbsp;<i class="fas fa-caret-down "></i>
				</button>
				<div class="collapse" id="collapse_profil_infos">
		            __MOD2_form_profil__
		        </div>
		    </div>

		    <div class="col-lg-12 annonces_list">
				<? require ($_app->base_dir.'/vues/list_annonces_annonceurs.php'); ?>
    		</div>
	    </div>
        

    	<div class="col-lg-2">
        	<div class="option_account">
	            <h4 class="title">Option(s) de compte</h4>

	        	<div class="change_password">
	        		<button class="btn btn-danger" data-toggle="modal" data-target="#change_password">Changer de mot de passe</button>
	        	</div>

	        	<div class="add_annonces">
	        		<button class="btn btn-warning" data-toggle="modal" data-target="#tata">Ajouter une annonce</button>
	        	</div>
        	</div>
        </div>

    </div>
</div>



	<!-- Modal Lost login-->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Changement de votre mot de passe</h4>
			</div>
			<div class="modal-body" style="height:235px;">
				<p class="text-center text-muted">Le mot de passe doit contenir au moins 6 caractères</p>
				<form action="#" method="post" data-toggle="validator" role="form">
                    <div class="form-group">
                        <div class="form-inline row">
                            <div class="form-group col-sm-12">
                                <input name="password-new" type="password" data-minlength="6" style="width:100%;" class="form-control" id="inputPassword" placeholder="Mot de passe" required>
                            </div>

                            <div class="form-group col-sm-12" style="margin-top:15px;">
                                <input type="password" style="width:100%;" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Oups!, les deux mots de passe ne correspondent pas." placeholder="Confirmation du mot de passe" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <input type="hidden" name="return_post_account_pass_change" value="<?= $rand_id_change_password ?>">
                        <button type="submit" class="col-xs-12 btn btn-action">Envoyer</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>




        
<? unset($_SESSION['error_change_password']); ?>