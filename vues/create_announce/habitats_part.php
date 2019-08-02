<div style="margin-top:15px;" class="col-xs-12 panel panel-default">
	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>
			Type d'habitat
		</h4>
	</div>
	<div class="panel-body">
		<div class="container text-center">
		    <div class="row"><?

		        foreach($array_type_habitat as $row_type_habitat)
		        {?>
		            <div class="col-sm-6 col-md-3">
		                <div class="thumbnail">
		                	<img src="/images/habitats/<?= $row_type_habitat->img; ?>">
		                    <div class="caption css-label">
		                        <h3 style="margin-top:0px;"><?= $row_type_habitat->name_human; ?></h3>
		                        <p class="text-muted"><?= $row_type_habitat->text; ?></p>
						      	<input
							      	class="test"
							      	id="toggle_<?=$row_type_habitat->name_sql; ?>"
									name="type_habitat" 
									type="radio" 
									value="<?= $row_type_habitat->id; ?>"
									<?= (!empty($last_announce->type_habitat) && $last_announce->type_habitat == $row_type_habitat->id)?'checked':''; ?>
									>

								<label style="margin:0; left:-39px;" for="toggle_<?=$row_type_habitat->name_sql; ?>">Je loue ceci</label>
		                    </div>
		                </div>
		            </div><?
		        }?>
		    </div>
		</div>
	</div>
</div>