<header id="head" class="secondary"></header>

	<div class="container">
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Création d'un compte</h1>
				</header><?
				//veux dire qu'il vient tout juste de créer son compte
				if(isset($_SESSION['error_sign_up']) && $_SESSION['error_sign_up'] === true)
				{?>
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Finalisation de création de compte</h3>
								<p class="text-center text-muted">
									Vous êtes désormais inscrit, Merci de votre confiance !
									<br>Vous pouvez désormais vous <a href="/login">connecter ici</a>.
								</p>
								<hr>
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']);
				}
				else
				{?>
								
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Création de votre compte Annonceur de locations</h3>
								<p class="text-center text-muted">
									Votre compte client vous permet de gérer vos annonces de locations ect...
									<br>Si vous avez déjà un login <a href="/login"><b>connectez-vous ici</b></a>.
								</p>
								<hr>
								<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
									<?= $_app->site_name; ?>, est actuellement gratuit le premiers mois, il vous sera ensuite demandé de souscrire un abonement, vous pourrez accéder au formule d'abonement directement depuis votre page "Mon compte".
								</p>
								<hr><?
								if(isset($_SESSION['error_sign_up']))
								{?>
									<p class="text-center text-danger">
										<?= $_SESSION['error_sign_up'] ?>
									</p>
									<hr><?
								}?>
								<form method="post" action="#" data-toggle="validator" role="form">

									<h4 class="title col-md-12">Partie personnelle<hr></h4>
								    <div class="col-md-12">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Login</span>
								            	<input required name="login" type="text" maxlength="20" pattern="[a-zA-Z_]{6,}" class="form-control" data-error="Votre login est trop court ou contient des chiffres" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>


							    	<div class="col-md-6">
							            <div class="form-group has-feedback">
							            	<div class="input-group">
							            		<span class="input-group-addon">Mot de passe</span>
								                <input required name="password-new" type="password" data-minlength="6" class="form-control" id="inputPassword" data-error="Votre mot de passe doit contenir au minimum 6 caractères" placeholder="Mot de passe" >
							                </div>
							                <div class="help-block with-errors"></div>
							            </div>
							        </div>

						            <div class="col-md-6">
							            <div class="form-group has-feedback">
							            	<div class="input-group">
							            		<span class="input-group-addon">Confirmation</span>
							                	<input required type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Oups!, les deux mots de passe ne correspondent pas." placeholder="Confirmation du mot de passe" >
							            	</div>
							            </div>
									</div>


								    <div class="col-md-12">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Adresse Email</span>
								            	<input required id="mail_form" name="mail" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" data-error="Votre adresse Email n'est pas valide" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-6">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Nom</span>
								            	<input required id="last_name_form" name="last_name" type="text" maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-6">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Prénom</span>
								            	<input required id="name_form" name="name" type="text"  maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-4">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Age</span>
								            	<input required id="age_form" name="age" type="text" value="" maxlength="3" pattern="[0-9]+" class="form-control" data-error="Max 999, uniquement des chiffres" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    

								    <div class="col-md-8">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Téléphone (Mobile)</span>
								            	<input required id="tel_form" name="tel" type="tel" value="" maxlength="10" pattern="[0-9]+" class="form-control" data-error="Caractère incorrect" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-12">
								        <div class="form-group has-success">
								            <div class="input-group" style="border: 1px solid #3c763d; color: #3c763d; background-color: #dff0d8;">
								                <span class="input-group-addon" style="border:none;">Genre</span>
								                <div class="radio" style="display:inline-block; margin-right:10px;">
								                    <label>
								                        <input value="Monsieur" checked="checked" type="radio" name="genre" >
								                        Monsieur
								                    </label>
								                </div>
								                <div class="radio" style="display:inline-block; margin-right:10px;">
								                    <label>
								                        <input value="Madame" type="radio" name="genre" >
								                        Madame
								                    </label>
								                </div>
								                <div class="radio" style="display:inline-block; margin-right:10px;">
								                    <label>
								                        <input value="Mademoiselle" type="radio" name="genre" >
								                        Mademoiselle
								                    </label>
								                </div>
								                <div class="radio" style="display:inline-block; margin-right:10px;">
								                    <label>
								                        <input value="Ne se prononce pas" type="radio" name="genre" >
								                        Ne se prononce pas
								                    </label>
								                </div>
								            </div>
								        </div>
								    </div>


								    <h4 class="title col-md-12 ">Partie adresse <small class="thin"> (De l'annonceur, pas des résidences)</small><hr></h4>

								    <div class="col-md-8">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Rue</span>
								            	<input required id="address_rue_form" name="address_rue" type="text" value="" class="form-control">
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-4">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Numéro</span>
								            	<input required id="address_numero_form" id="address_numero" type="text" value="" class="form-control" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-8">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Ville</span>
								            	<input required id="ville_form" name="address_localite" type="text" value="" class="form-control">
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-4">
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Code Postal</span>
								            	<input required id="zip_code_form" name="zip_code" type="text" value="" maxlength="5" pattern="[0-9]+" class="form-control" data-error="Code postal incorrect" >
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>

								    <div class="col-md-12">
								    	
								    	<div class="form-group has-feedback">
								        	<div class="input-group">
								            	<span class="input-group-addon">Pays</span>
								            	<select name="pays" id="pays_form" class="form-control">
								            		<option selected name="pays" value="Belgique">Belgique</option>
								            		<option name="pays" value="France">France</option>
								            		<option name="pays" value="French Guiana">French Guiana</option>
								            		<option name="pays" value="French Polynesia">French Polynesia</option>
								            		<option name="pays" value="French Southern Territories">French Southern Territories</option>
								            		<option name="pays" value="Germany">Germany</option>
								            		<option name="pays" value="Croatia">Croatia</option>
								            		<option name="pays" value="Canada">Canada</option>
								            		<option name="pays" value="Andorra">Andorra</option>
								            		<option name="pays" value="Guadeloupe">Guadeloupe</option>
								            		<option name="pays" value="Italie">Italie</option>
								            		<option name="pays" value="Luxembourg">Luxembourg</option>
								            		<option name="pays" value="Martinique">Martinique</option>
								            		<option name="pays" value="Pays-Bas">Pays-Bas</option>
								            		<option name="pays" value="Netherlands Antilles">Netherlands Antilles</option>
								            		<option name="pays" value="Panama">Panama</option>
								            		<option name="pays" value="Poland">Poland</option>
								            		<option name="pays" value="Portugal">Portugal</option>
								            		<option name="pays" value="Reunion Island">Reunion Island</option>
								            		<option name="pays" value="Spain">Spain</option>
								            		<option name="pays" value="United Kingdom">United Kingdom</option>
								            		<option name="pays" value="United State">United State</option>
								            	</select>
								        	</div>
								        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								        	<div class="help-block with-errors"></div>
								    	</div>
								    </div>
								
									
									<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
										Toutes les informations complémentaires serons modifiables dans le menu "Mon compte" puis "Profil"<hr>
									</p>
									<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
										<b>Votre inscription sera validée par un administrateur, vous serez contacter par sms pour la véracité de votre demande.</b>
									</p>
									

									<p class="col-xs-12 text-center">
										<a data-toggle="modal" data-target="#view_condition_general" class="opt_annonce">
		                                	<small><i class="fa fa-angle-double-right "></i><span>&nbsp;Cliquer ici pour voir les conditions général du site&nbsp;</span><i class="fa fa-angle-double-left "></i></small>
		                            	</a>
	                            	</p>
									<hr>

									<div class="text-center col-md-12"><hr>
								    	<input type="hidden" name="rand_id_sign_up" value="<?= $rand_id_sign_up ?>">
								        <button type="submit" class="btn btn-success btn-fill btn-wd">S'inscrire</button>
								    </div>
								    <div class="clearfix"></div>
							    </form>
								
							</div>
						</div>
					</div><?
					unset($_SESSION['error_sign_up']); // permet de ne pas afficher les erreurs de connection si on reload la page
				}?>

		</article>
	</div>
</div>



<!-- Modal rélgement du site -->
<div class="modal fade" id="view_condition_general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Condition général d'utilisation du site</h4>
            </div>
            <div class="modal-body" style="height:340px;">
                <p class="text-center text-muted">Bla bla bla</p>

                <hr>
                <p class="text-center text-muted">Bla bla bla</p>

                <hr>
                <p class="text-center text-muted">Bla bla bla</p>
            </div>
        </div>
    </div>
</div>



