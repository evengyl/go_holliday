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

		        foreach($array_type as $row_type)
		        {?>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail"><?
		                    if(isset($row_type->icon))
		                        echo $row_type->icon;?>
		                    <hr>
		                    <img src="/images/categories/<?= $row_type->img; ?>" class="img-responsive" alt="<?= $row_type->name; ?>">
		                    <div class="caption">
		                        <h3><?= $row_type->title; ?></h3>
		                        <p class="text-muted"><?= $row_type->text; ?></p>
		                        <div class="checkbox type_vacances btn btn-primary">
								    <label style="color:white; font-weight: bold; text-shadow: 0 2px 1px rgba(0, 0, 0, .2);">
								      	<input style="
								      	position: absolute; 
								      	top: -4px; 
								      	left: 20px; 
								      	height:100%;
								      	width:100%;
								      	opacity: 0;"
										data-name="type_vacances"  type="checkbox" value="<?= $row_type->name; ?>">
								      		Type de vacances "<?= $row_type->name; ?>"
								    </label>
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
		$("input[data-name='type_vacances']").click(function(){

			$('.type_vacances.checkbox:checkbox:checked').prop('checked', false);

			$('.type_vacances').css({"color" : "#FFEFD7", "background-color" : "#FF9B22", "border-color" : "#122b40", "background-image" : "none"});


			$(this).prop('checked', true);
			$(this).parent().parent().css({"color" : "#fff", "background-color" : "#286090", "border-color" : "#122b40", "background-image" : "none"});
		});
	});
</script>