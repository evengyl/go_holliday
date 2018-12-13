<header id="head" class="secondary"></header>
<div class="container-fluid text-center" style="background-color: #f2f2f2;">
    <div class="row">
        <h2 class="thin">Mon compte</h2>
    </div>
    <div class="row page-profil">
        <div class="col-lg-3">
            <div class="profil">

                <div class="back_profil">
                    <img class="img-responsive" src="/images/autre_licences/background.jpg" alt="..."/>
                </div>

                <div style="text-align: center; text-transform: none; margin-top: -65px;">
                	<div class="content-image-profil">
                  		<img class="img-circle" src="/images/autre_licences/face-0.jpg" alt="..."/>
                    	<div class="in_middle"><button class="btn" style=""><i class="fa fa-cog"></i></button></div>
                	</div>
          			
          			<h4><?= $infos_user->last_name." ".$infos_user->name ?></h4>
              		<p class="text-muted" ><small>@Type D'utilisateur : <?= $infos_user->user_type_name ?></small></p>
                </div>
                <p class="text-muted">
                	<small>@Adresse Email : <?= $infos_user->email ?></small>
            	</p>
            	<p class="text-muted">
                    @Tel : <?= $infos_user->tel ?>
                </p>
                <p class="text-muted">
                    @Adresse : <?= $infos_user->address_numero.", Rue ".$infos_user->address_rue." à ".$infos_user->zip_code." : ".$infos_user->address_localite ?>
                </p>
                <hr>
                <div class="row block_suivis">
                    <div class="col-lg-4">
                        <h4>
                        	<?= $infos_user->nb_annonces ?><br>
                    		<small>Annonces actives</small>
                    	</h4>
                    </div>
                    <div class="col-lg-4">
                        <h4>
                        	<?= $infos_user->nb_vues_total ?><br>
                        	<small>Vues</small>
                        </h4>
                    </div>
                    <div class="col-lg-4">
                        <h4>
                        	0<br>
                        	<small>Messages non lus</small>
                        </h4>
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
			<div class="modal-body" style="height:200px;">
				<p class="text-center text-muted">Le mot de passe doit contenir au moins 6 caractères</p>
				<form action="#" method="post">
					<div class="col-xs-12 form-group">
						<input name="password-new_1" type="password" class="form-control" required autofocus placeholder="Mot de passe">
					</div>
					<div class="col-xs-12 form-group">
						<input name="password-new_2" type="password" class="form-control" required autofocus placeholder="Confirmation du Mot de passe">
					</div>
					<input type="hidden" name="return_post_account_pass_change">
					<button type="submit" class="col-xs-12 btn btn-action">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
</div>


