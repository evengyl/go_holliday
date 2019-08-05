<div style="margin-top:15px; background:url('/images/autres/back_part_date_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h4>Ajotuer une période de location pour cette annonce</h4>
		<small class="text-muted thin">La date de période comprends la date ou la première location peux être mise en route et la date de fin</small><br>
		<small class="text-muted thin"><b>Si aucune date n'est sélectionnée une période de un mois sera enregistrée</b></small>
	</div>
	<!-- Partie date des annonce MODAL-->
	<div class="panel-body">
		<div class="text-center col-xs-12"><hr>

		    <div class="form-group has-success col-lg-6">
		    	<div class="alert alert-info" role="alert">Date de Début de saison : <?=(isset($last_announce->start_saison))?$last_announce->start_saison:'';?></div>
			    <div class="input-group">
					<input 
						style="cursor:pointer;" 
						class="form-control datepicker-here" 
						id="start_saison_" 
						data-position="bottom right" 
						data-inline="true"
						type="hidden" 
						name="start_saison" 
						value="<?=(isset($last_announce->start_saison))?$last_announce->start_saison:'';?>"
						data-language='fr'>
			    </div>
			</div>

		    <div class="form-group has-success col-lg-6">
		    	<div class="alert alert-info" role="alert">Date de Fin de saison : <?=(isset($last_announce->end_saison))?$last_announce->end_saison:'';?></div>
			    <div class="input-group">
					<input 
						style="cursor:pointer;" 
						class="form-control datepicker-here" 
						id="end_saison_" 
						data-position="bottom right"
						data-inline="true"
						type="hidden" 
						name="end_saison" 
						value="<?=(isset($last_announce->end_saison))?$last_announce->end_saison:'';?>"
						data-language='fr'>
			    </div>
			</div>

	    </div>
	</div>
</div>


<script>
$(document).ready(function()
{
	// Initialization
	$('#start_saison_ #end_saison_').datepicker(
	{
    	todayButton: new Date()
	})

	// Access instance of plugin
	$('#start_saison_ #end_saison_').data('datepicker');

});
</script>