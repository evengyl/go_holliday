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