<div style="margin-top:15px;" class="col-xs-12 panel panel-default">
	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>
			Type d'annonce<small class="text-muted thin"><br>
			(Ce sera la / les catégorie(s) de votre annonce)</small>
		</h4>
	</div>
	<div class="panel-body">
		<div class="container text-center">
		    <div class="row"><?

		        foreach($array_type_vacances as $row_type_vacances)
		        {?>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail"><?
		                    if(isset($row_type_vacances->icon))
		                        echo $row_type_vacances->icon;?>
		                    <hr>
		                    <img src="/images/categories/<?= $row_type_vacances->img; ?>" class="img-responsive" alt="<?= $row_type_vacances->name; ?>">
		                    <div class="caption">
		                        <h3><?= $row_type_vacances->title; ?></h3>
		                        <p class="text-muted"><?= $row_type_vacances->text; ?></p>
		                        <div class="checkbox type_vacances btn <?=(isset($_POST['type_vacances']) && $_POST['type_vacances'] == $row_type_vacances->name)?"btn-info":"btn-primary"; ?>">
           								<div class="input-group">
										    <label style="color:white; font-weight: bold; text-shadow: 0 2px 1px rgba(0, 0, 0, .2);">
										      	<input
													data-name="type_vacances" 
													name="type_vacances[]" 
													type="checkbox" 
													data-error="Vous devez choisir un type de vacances"
													value="<?= $row_type_vacances->name; ?>">
										      			Type de vacances "<?= $row_type_vacances->name; ?>"
										    </label>
										</div>
										<div class="help-block with-errors"></div>
							    </div>
		                    </div>
		                </div>
		            </div><?
		        }?>
		    </div>
		</div>
	</div>
</div>

<script>
$(document).ready(function()
{
	$("input[data-name='type_vacances']").on("click", function()
	{
		var button_tested = $(this).parent().parent().parent();

		if($(button_tested).hasClass('btn-info'))
		{
			$(button_tested)
				.removeClass('btn-info')
				.addClass('btn-primary')
		}
		else{
			$(button_tested)
				.removeClass('btn-primary')
				.addClass('btn-info')	
		}

	});
})
</script>