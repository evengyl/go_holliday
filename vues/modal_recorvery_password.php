
<!-- Modal Lost login-->
<div class="modal fade" id="lost_login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Récupération de votre mot de passe</h4>
			</div>
			<div class="modal-body" style="height:180px;">
				<p class="text-center text-muted">Pour récupérer votre mot de passe veuillez entrer votre adresse mail ou votre pseudo,</br>
				nous vous enverrons un Mail contenant votre mot de passe</p>
				<form action="#" method="post">
					<div class="col-xs-12 form-group">
						<input name="pseudo_mail" minlength="6" type="text" class="form-control" required autofocus placeholder="Pseudo / Email">
					</div>
					<input type="hidden" name="lost_login_form">
					<button type="submit" class="col-xs-12 btn btn-action">Récupérer votre mot de passe</button>
				</form>
			</div>
		</div>
	</div>
</div>