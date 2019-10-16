<div class="modal fade" id="form_avantages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Changement de vos préférences</h4>
			</div>
			<div class="modal-body" style="height:235px;">
				<p class="text-center text-muted">Les avantages peuvent vous permettre d'être plus facilement visible par les clients.</p>
				<form action="#" method="post" data-toggle="validator" role="form">
                    <div class="form-group">
                        <div class="form-inline row">
                            <div class="row"><?	
                        		foreach($_app->user->preference as $row_preference)
                        		{?>
									<div class="col-xs-8 col-xs-offset-2">
										<label class="col-xs-12" style="text-align:left;">
								        	<input type="checkbox" <?= ($row_preference->value)? 'checked="true"' : ''; ?> name="list_preference[<?= $row_preference->name_sql; ?>]" value="<?= $row_preference->value; ?>">&nbsp;&nbsp;<?= $row_preference->name_human; ?>
							        	</label>
									</div><?
								}?>
							</div>
                        </div>
                        <button type="submit" style="margin-top:15px;" class="col-xs-12 btn btn-action">Envoyer</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>