<div style="margin-top:15px; background:url('/images/autres/back_part_complementary_infos_create_announce.png') no-repeat top;" class="col-xs-12 panel panel-default">
	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h4>Informations complémentaires</h4>
		<small class="text-muted thin">Remplir un maximum d'informations vous permettra d'être mieux mis en avant graçe à des recherches plus poussées</small>
	</div>
	
	<div class="panel-body">
		<div class="text-center col-xs-12"><hr>

            <div class="form-group has-feedback">
                <div class="input-group">
					<span class="input-group-addon">Nombre de personne maximums acceptées</span>
					<input type="text" name="max_personn" value="<?= (isset($last_announce->max_personn))? $last_announce->max_personn : ''; ?>" maxlength="2" pattern="[0-9]{0,2}" class="form-control" data-error="Le nombre de personnes s'écrit avec des chiffres.">
                </div>
                <div class="help-block with-errors"></div>
            </div>

	    </div>
	</div>


	<div class="panel-body" style="padding:0 0 15px 0;">
		<div class="col-xs-12"style="background:white;">
			<div class="form-group">
                <div class="input-group col-xs-12">
				    <div class="checkbox">
				    	<label class="col-xs-4" style="text-align:left;">
				        	<input type="checkbox" <?= (isset($last_announce->pet))? 'checked="true"' : ''; ?> name="pet" value="1">
				        	Animaux autorisés
			        	</label>
				    	<label class="col-xs-4" style="text-align:left;">
				        	<input type="checkbox" <?= (isset($last_announce->handicap))? 'checked="true"' : ''; ?> name="handicap" value="1">
				        	Accès pour personnes à mobilité réduite
			        	</label>
				    	<label class="col-xs-4" style="text-align:left;">
				        	<input type="checkbox" <?= (isset($last_announce->parking))? 'checked="true"' : ''; ?> name="parking" value="1">
				        	Parking gratuit à proximité immédiate
			        	</label>
				    </div>
                </div>
            </div>
		</div>
	</div>


	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h5>Activités proche de ce lieu</h5>
		<small class="text-muted thin">(Nous estimons que les activités dites proches, sont ou dans le lieu, ou très proche, moins de 1 Km)</small>
	</div>

	<div class="panel-body" style="padding:0 0 15px 0;">
		<div class="col-xs-12"style="background:white;">
			<h6>Sport(s)</h6>
            <div class="form-group">

                <div class="input-group col-xs-12">
				    <div class="checkbox"><?
				    foreach($array_list_sport as $row_sport)
				    {?>
				    	<label class="col-xs-4" style="text-align:left;">
				        	<input type="checkbox" <?= (isset($last_announce->list_sport) && in_array($row_sport->name_sql, $last_announce->list_sport))? 'checked="true"' : ''; ?> name="list_sport[]" value="<?= $row_sport->name_sql; ?>"><?= $row_sport->name_human; ?>
			        	</label><?
				    }?>
				    </div>
                </div>
            </div>

            <h6>Si des sports ne figure pas dans ces listes, veuillez nous les fournir ici, nous prendrons le temps de les ajoutées aux listes</h6>
            <div class="form-group has-feedback">
                <div class="input-group">
					<span class="input-group-addon">Autre(s) (séparé d'une virgule)</span>
					<input type="text" name="other_sport" pattern="[a-zA-Z, -]{2,}" placeholder="exemple, exemple, exemple" value="<?= (isset($_POST['other_sport']))? $_POST['other_sport'] : ''; ?>" class="form-control">
                </div>
            </div>



			<h6>Autre(s) activité(s)</h6>
            <div class="form-group">
                <div class="input-group col-xs-12">
				    <div class="checkbox"><?
				    foreach($array_list_activity as $row_activity)
				    {?>
				    	<label class="col-xs-4" style="text-align:left;">
				        	<input type="checkbox" <?= (isset($last_announce->list_activity) && in_array($row_activity->name_sql, $last_announce->list_activity))? 'checked="true"' : ''; ?> name="list_activity[]" value="<?= $row_activity->name_sql; ?>"><?= $row_activity->name_human; ?>
			        	</label><?
				    }?>
				    </div>
                </div>
            </div>

            <h6>Si des activités ne figure pas dans ces listes, veuillez nous les fournir ici, nous prendrons le temps de les ajoutées aux listes</h6>
            <div class="form-group has-feedback">
                <div class="input-group">
					<span class="input-group-addon">Autre(s) (séparé d'une virgule)</span>
					<input type="text" name="other_activity" pattern="[a-zA-Z, -]{2,}" placeholder="exemple, exemple, exemple" value="<?= (isset($_POST['other_activity']))? $_POST['other_activity'] : ''; ?>" class="form-control">
                </div>
            </div>

	    </div>
	</div>
</div>