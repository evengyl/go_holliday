<div style="margin-top:15px;" class="col-xs-12 panel panel-default">
	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>
			Type d'habitat
			<small class="text-muted thin">(Le type de bien que vous proposez à la location)</small>
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
						      	<input
							      	class="test"
							      	id="toggle_<?=$row_type_habitat->name_sql; ?>"
									name="type_habitat" 
									type="radio" 
									value="<?= $row_type_habitat->id; ?>"
									<?= (!empty($last_announce->name_habitat_sql) && $last_announce->name_habitat_sql == $row_type_habitat->name_sql)?'checked':''; ?>
									>

								<label style="padding: 7px 30px 7px 45px;  margin:0; left:-39px;" for="toggle_<?=$row_type_habitat->name_sql; ?>">Je loue ceci</label>
		                    </div>
		                </div>
		            </div><?
		        }?>
		    </div>
		</div>
	</div>
</div>
