<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		
		<h3 class="text-center thin" style="margin-top:0px;">Vacances orientée pour ?</h3>
		<div class="row" style="margin-top:25px;"><? 
			if(isset($annonce->array_type_vacances))
			{
				$colonage_type = "col-xs-4";
				$nb_type = count($annonce->array_type_vacances->id);

				if($nb_type == 1)
					$colonage_type = "col-xs-4 col-xs-offset-4";
				else if($nb_type == 2)
					$colonage_type = "col-xs-4 col-xs-offset-2";

				foreach($annonce->array_type_vacances->icon as $key => $row_type)
				{?>
					<div class="<?= $colonage_type ?>">
						<div class="thumbnail" style="padding-top:10px;">
							<?= $row_type; ?>
							<div class="caption">
								<h3 class="text-muted thin" style="margin-top:5px;"><?= $annonce->array_type_vacances->text[$key]; ?></h3>
							</div>
						</div>
					</div><?
					$colonage_type = "col-xs-4";
				}
			}?>
			<h3 class="text-center thin col-xs-12" style="margin-top:0px;">C'est un bien pour <b><?= $annonce->max_personn; ?></b> personne(s) maximum</h3>
		</div>
	</div>
</div>