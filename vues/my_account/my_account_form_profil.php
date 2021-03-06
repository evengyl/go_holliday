<div class="modal fade" id="form_profil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modification de votre profil</h4>
            </div>
            <div class="modal-body" style="">
                <form method="post" action="#"  data-toggle="validator" role="form">

                    <div class="col-md-4">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Login</span>
                            	<input id="login_form" name="login" type="text" value="<?= $this->_app->user->login ?>" maxlength="20" pattern="[a-zA-Z_]{6,}" class="form-control" data-error="Votre login est trop court ou contient des chiffres" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-8">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Adresse Email</span>
                            	<input id="mail_form" name="mail" type="email" value="<?= $this->_app->user->email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" data-error="Votre adresse Email n'est pas valide" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-6">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Nom</span>
                            	<input id="last_name_form" name="last_name" type="text" value="<?= $this->_app->user->last_name ?>" maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-6">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Prénom</span>
                            	<input id="name_form" name="name" type="text" value="<?= $this->_app->user->name ?>" maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-4">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Age</span>
                            	<input id="age_form" name="age" type="text" value="<?= $this->_app->user->age ?>" maxlength="3" pattern="[0-9]+" class="form-control" data-error="Max 999, uniquement des chiffres" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    

                    <div class="col-md-8">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Téléphone (Mobile)</span>
                            	<input id="tel_form" name="tel" type="tel" value="<?= $this->_app->user->tel ?>" maxlength="10" pattern="[0-9]+" class="form-control" data-error="Caractère incorrect" >
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
                                        <input <?=($_app->user->genre == "Monsieur")?'checked="checked"':''; ?> type="radio" value="Monsieur" name="genre" required>
                                        Monsieur
                                    </label>
                                </div>
                                <div class="radio" style="display:inline-block; margin-right:10px;">
                                    <label>
                                        <input <?=($_app->user->genre == "Madame")?'checked="checked"':''; ?> type="radio" value="Madame" name="genre" required>
                                        Madame
                                    </label>
                                </div>
                                <div class="radio" style="display:inline-block; margin-right:10px;">
                                    <label>
                                        <input <?=($_app->user->genre == "Mademoiselle")?'checked="checked"':''; ?> type="radio" value="Mademoiselle" name="genre" required>
                                        Mademoiselle
                                    </label>
                                </div>
                                <div class="radio" style="display:inline-block; margin-right:10px;">
                                    <label>
                                        <input <?=($_app->user->genre == "N/C")?'checked="checked"':''; ?> type="radio" value="N/C" name="genre" required>
                                        Ne se prononce pas
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h4 class="title col-md-12 ">Partie adresse<hr></h4>

                    <div class="col-md-8">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Rue</span>
                            	<input id="address_rue_form" name="address_rue" type="text" value="<?= $this->_app->user->address_rue ?>" class="form-control">
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-4">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Numéro</span>
                            	<input id="address_numero_form" id="address_numero" type="text" value="<?= $this->_app->user->address_numero ?>" class="form-control" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-8">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Ville</span>
                            	<input id="ville_form" name="address_localite" type="text" value="<?= $this->_app->user->address_localite ?>" class="form-control">
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-4">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Code Postal</span>
                            	<input id="zip_code_form" name="zip_code" type="text" value="<?= $this->_app->user->zip_code ?>" maxlength="5" pattern="[0-9]+" class="form-control" data-error="Code postal incorrect" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>

                    <div class="col-md-12">
                    	<div class="form-group has-feedback">
                        	<div class="input-group">
                            	<span class="input-group-addon">Pays</span>
                            	<input id="pays_form" name="pays" type="text" value="<?= $this->_app->user->pays ?>" pattern="[a-zA-Z_\- ]+" class="form-control" data-error="Pays inconnu" >
                        	</div>
                        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        	<div class="help-block with-errors"></div>
                    	</div>
                    </div>


                    <div class="text-center col-md-12"><hr>
                    	<input type="hidden" name="rand_id_update_profil" value="<?= $rand_id_update_profil ?>">
                        <button type="submit" class="btn btn-success btn-fill btn-wd">Sauvegarder les modifications</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>